<script>

    function editBtn(data){
        console.log(data)
        document.querySelector('#modalEdit [name="id"]').value = data.id;
        document.querySelector('#modalEdit [name="name"]').value = data.name;
        document.querySelector('#modalEdit [name="role_id"]').value = data.role_id;
        document.querySelector('#modalEdit [name="card_uid"]').value = data.card.uid;
    }

    function delBtn(id){
        document.querySelector('#modalDelete [name="id"]').value = id;
    }

</script>
