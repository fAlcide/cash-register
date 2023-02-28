<?php

print_r($users);

echo "<br>";

echo "page users";

echo "<br>";
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<button class="favorite styled" type="button" onclick="ajouter()">Ajouter user</button>


<script>

    function ajouter(){
        console.log("ajouter");

        $.ajax({
            type: "GET",
            url: "http://localhost:8888/cash_register/public/users/newUser"
        });
    }
</script>