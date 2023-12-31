<script>

    function nextBtn(total, idr){
        document.querySelector('#modalNext [name="total"]').value = 'Rp. ' + idr;
        document.querySelector('#modalNext [name="total_word"]').value = numberToWord(total);
    }

    function editBtn(data){
        document.querySelector('#modalEdit [name="id"]').value = data.id;
        document.querySelector('#modalEdit [name="amount"]').value = data.amount;
    }

    function delBtn(id){
        document.querySelector('#modalDelete [name="id"]').value = id;
    }

    function numberToWord(n) {
    if (n < 0)
      return false;
	 single_digit = ['', 'SATU', 'DUA', 'TIGA', 'EMPAT', 'LIMA', 'ENAM', 'TUJUH', 'DELAPAN', 'SEMBILAN']
	 double_digit = ['SEPULUH', 'SEBELAS', 'DUA BELAS', 'TIGA BELAS', 'EMPAT BELAS', 'LIMA BELAS', 'ENAM BELAS', 'TUJUH BELAS', 'DELAPAN BELAS', 'SEMBILAN BELAS']
	 below_hundred = ['DUA PULUH', 'TIGA PULUH', 'EMPAT PULUH', 'LIMA PULUH', 'ENAM PULUH', 'TUJUH PULUH', 'DELAPAN PULUH', 'SEMBILAN PULUH']
	if (n === 0) return 'NOL'
	function translate(n) {
		word = ""
		if (n < 10) {
			word = single_digit[n] + ' '
		}
		else if (n < 20) {
			word = double_digit[n - 10] + ' '
		}
		else if (n < 100) {
			rem = translate(n % 10)
			word = below_hundred[(n - n % 10) / 10 - 2] + ' ' + rem
		}
		else if (n < 1000) {
			word = single_digit[Math.trunc(n / 100)] + ' RATUS ' + translate(n % 100)
		}
		else if (n < 1000000) {
			word = translate(parseInt(n / 1000)).trim() + ' RIBU ' + translate(n % 1000)
		}
		else if (n < 1000000000) {
			word = translate(parseInt(n / 1000000)).trim() + ' JUTA ' + translate(n % 1000000)
		}
		else {
			word = translate(parseInt(n / 1000000000)).trim() + ' MILIAR ' + translate(n % 1000000000)
		}
		return word
	}
	 result = translate(n)
	return result.trim()+'.'
}

</script>
