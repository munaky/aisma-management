<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class View extends Controller
{
    public function __invoke(Request $req, $role, $page)
    {
        info('Controller: View; Method: __invoke');

        if (!view()->exists("users.$role.$page.index")) {
            return Etc::errView(404);
        };

        if (method_exists($this, $role . $page)) {
            $data = $this->{$role . $page}($req);
            $content = view("users.$role.$page.index", ['data' => $data]);
        } else {
            $content = view("users.$role.$page.index");
        }

        return view("users.$role.index", [
            'content' => $content
        ]);
    }

    private function adminhome(Request $req)
    {
        $yearNow = date('Y');
        $dateNow = Etc::dateNow();
        $oneMonthBefore = Etc::oneMonthBefore();
        $oneYearBefore = Etc::oneYearBefore();
        /* $histories = $this->models['history']::whereBetween('date_end', [$oneYearBefore, $dateNow])
            ->with('products.detail')
            ->withSum('products', 'price')
            ->withSum('products', 'amount')
            ->get(); */
        $histories = $this->models['history']::with('products.detail')
            ->withSum('products', 'price')
            ->withSum('products', 'amount')
            ->get();
        $profitToday = 0;
        $oneMonthProfit = 0;
        $oneYearProfit = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $bestSeller = [
            'total' => 0,
            'listProducts' => [],
            'products' => [],
        ];
        $onDelivery = 0;
        $soldToday = 0;

        foreach ($histories as $history) {
            $date = $history->date_end;
            $profit = $history->products_sum_price;
            $sold = $history->products_sum_amount;
            $status = $history->status_id;
            $month = date('n', strtotime($date));
            $year = date('Y', strtotime($date));

            if ($date == $dateNow) {
                $profitToday += $profit;
                $soldToday += $sold;
            }

            if ($date >= $oneMonthBefore) {
                $oneMonthProfit += $profit;
            }

            if ($status == 2) {
                $onDelivery += 1;
            }

            if ($yearNow == $year) {
                $oneYearProfit[$month - 1] += $profit;
            }

            foreach ($history->products as $product) {
                $productName = $product->detail->name;

                if (!in_array($productName, $bestSeller['listProducts'])) {
                    array_push($bestSeller['listProducts'], $productName);
                    array_push($bestSeller['products'], ['name' => $productName, 'amount' => 0, 'percentage' => 0]);
                }

                $bestSeller['products'][array_search($productName, $bestSeller['listProducts'])]['amount'] += $product->amount;
                $bestSeller['total'] += $product->amount;
            }
        }

        foreach ($bestSeller['products'] as $product) {
            $bestSeller['products'][array_search($product, $bestSeller['products'])]['percentage'] = round(($product['amount'] / $bestSeller['total']) * 100);
        }

        return [
            'profitToday' => Etc::idr($profitToday),
            'oneMonthProfit' => Etc::idr($oneMonthProfit),
            'oneYearProfit' => $oneYearProfit,
            'onDelivery' => $onDelivery,
            'soldToday' => $soldToday,
            'bestSeller' => collect($bestSeller['products'])->sortByDesc('percentage')->toArray(),
        ];
    }

    private function adminproducts(Request $req)
    {
        $data = $this->models['product']::all();

        foreach ($data as $item) {
            $item->price_idr = Etc::idr($item->price);
        }

        return $data;
    }

    private function adminemployees(Request $req)
    {
        $dateNow = date('d/m/Y');

        $data = [
            'employees' => $this->models['employee']::with(['role', 'card', 'attendance' => function ($query) use ($dateNow) {
                $query->where('date', $dateNow);
            }])
                ->get(),
            'role' => $this->models['role']::all(),
        ];

        return $data;
    }

    private function adminattendance_history(Request $req)
    {
        return $this->models['attendance_history']::with(['employee.role'])->get();
    }

    private function adminlist(Request $req)
    {
        if (!session()->get('list')) {
            return [];
        }

        $total = 0;
        $products = session()->get('list');

        foreach ($products as $key => $val) {
            $products[$key]['price_idr'] = Etc::idr($val['price']);
            $products[$key]['total_idr'] = Etc::idr($val['total']);

            $total += $val['total'];
        }

        return [
            'total' => $total,
            'total_idr' => Etc::idr($total),
            'products' => $products,
        ];
    }

    private function adminhistory(Request $request)
    {
        $histories = $this->models['history']::with(['status'])->get();
        $status = $this->models['status']::all();

        return [
            'histories' => $histories,
            'status' => $status,
        ];
    }
}
