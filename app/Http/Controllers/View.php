<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class View extends Controller
{
    public function __invoke(Request $req, $role, $page)
    {
        info('Controller: Views; Method: __invoke');

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
        $dateNow = Etc::dateNow();
        $oneMonthBefore = Etc::oneMonthBefore();
        $sixMonthBefore = Etc::sixMonthBefore();
        $histories = $this->models['history']::whereBetween('date_end', [$sixMonthBefore, $dateNow])
            ->withSum('products', 'price')
            ->withSum('products', 'amount')
            ->get();
        $profitToday = 0;
        $oneMonthProfit = 0;
        $onDelivery = 0;
        $soldToday = 0;


        foreach ($histories as $history) {
            $date = $history->date_end;
            $profit = $history->products_sum_price;
            $sold = $history->products_sum_amount;
            $status = $history->status_id;

            if ($date == $dateNow) {
                $profitToday += $profit;
                $soldToday += $sold;
            }

            if ($date <= $dateNow || $date >= $oneMonthBefore) {
                $oneMonthProfit += $profit;
            }

            if ($status == 2) {
                $onDelivery += 1;
            }
        }

        return [
            'profitToday' => $profitToday,
            'oneMonthProfit' => $oneMonthProfit,
            'onDelivery' => $onDelivery,
            'soldToday' => $soldToday,
        ];
    }

    private function adminproducts(Request $req)
    {
        return $this->models['product']::all();
    }
}
