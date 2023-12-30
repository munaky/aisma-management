<script>

    function editBtn(data){
        document.querySelector('#modalEdit [name="id"]').value = data.id;
        document.querySelector('#modalEdit [name="path"]').value = data.image;
        document.querySelector('#modalEdit [name="name"]').value = data.name;
        document.querySelector('#modalEdit [name="size"]').value = data.size;
        document.querySelector('#modalEdit [name="unit"]').value = data.unit;
        document.querySelector('#modalEdit [name="stock"]').value = data.stock;
        document.querySelector('#modalEdit [name="price"]').value = data.price;
        document.querySelector('#modalEdit [name="description"]').value = data.description;
    }

    function delBtn(id){
        document.querySelector('#modalDelete [name="id"]').value = id;
    }

    function listBtn(id){
        document.querySelector('#modalList [name="id"]').value = id;
    }


</script>
