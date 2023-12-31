<script>

    function editBtn(data){
        document.querySelector('#modalEdit [name="id"]').value = data.id;
        document.querySelector('#modalEdit [name="status_id"]').value = data.status.id;
    }

    function delBtn(id){
        document.querySelector('#modalDelete [name="id"]').value = id;
    }

</script>
