 <!DOCTYPE HTML>
 <html>

 <head>
     <title>Lab3</title>
 </head>
 <script>
    var ajax = new XMLHttpRequest();

function button1() {
    ajax.onreadystatechange = function() {
        if (ajax.readyState === 4) {
            if (ajax.status === 200) {
                console.dir(ajax.responseText);
                document.getElementById("result").innerHTML = ajax.response;
            }
        }
    }
    var vendor = document.getElementById("vendor").value;
    ajax.open("get", "1_1.php?vendor=" + vendor);
    ajax.send();
}

function button2() {
    ajax.onreadystatechange = function() {
        if (ajax.readyState === 4) {
            if (ajax.status === 200) {
                console.dir(ajax);
                let category = document.getElementById("category").value;
                let rows = ajax.responseXML.firstChild.children;
                let result = "Товары категории " + category;
                result += "<ol>";
                for (var i = 0; i < rows.length; i++) {
                    result += "<li> Товар: " + rows[i].children[0].firstChild.nodeValue + "</li>";
                }
                document.getElementById("result").innerHTML = result;
                result +="</ol>";
            }
        }
    }
    var category = document.getElementById("category").value;
    ajax.open("get", "1_2.php?category=" + category);
    ajax.send();
}

function button3() {
    ajax.onreadystatechange = function(){
    var rows = JSON.parse(ajax.responseText);
    if (ajax.readyState === 4) {
        if (ajax.status === 200) {
            let min_price = document.getElementById("min_price").value;
            let max_price = document.getElementById("max_price").value;
            console.dir(ajax);
            let result = "Товары по цене от " + min_price + " до " + max_price;
            result +="<ol>";
            for (var i = 0; i < rows.length; i++) {
                result += "<li>Товар: " + rows[i].name + ", цена этого товара: " + rows[i].price +  "</li>";
            }
            resilt = result + "</ol>";
            document.getElementById("result").innerHTML = result;
        }
    }
    };
    var min_price = document.getElementById("min_price").value;
    var max_price = document.getElementById("max_price").value;
    ajax.open("get", "1_3.php?min_price=" + min_price + "&max_price=" + max_price);
    ajax.send();
}
 </script>
 <body>
     <?php
        include 'conn.php';
        ?>
     <h2>Фоменко Лина. Вариант №5. Лабораторная №3 (AJAX)</h2>
     <p>Для товара задается название, фирма-производитель,
         категория товара (процессоры, материнские платы и т.д.),
         цена товара, количество единиц на складе.</p>
     <ul>
         <li>товары выбранного производителя;</li>
         <li>товары выбранной категории;</li>
         <li>товары в выбранном ценовом диапазоне.</li>
     </ul>

         <p>Товары производителя: <select name="vendor" id="vendor">
                 <?php
                    $sqlSelect = "SELECT DISTINCT name FROM $db.vendors";
                    $document = $dbh->query($sqlSelect);
                    foreach ($document as $cell) {
                        echo "<option>";
                        print($cell[0]);
                        echo "</option>";
                    }
                    ?>
             </select>
             <button onclick="button1()"> Получить </button>
         </p>

         <p>Товары категории <select name="category" id="category">
                 <?php
                    $sqlSelect = "SELECT DISTINCT name FROM $db.category";
                    $document = $dbh->query($sqlSelect);
                    foreach ($document as $cell) {
                        echo "<option>";
                        print($cell[0]);
                        echo "</option>";
                    }
                    ?>
             </select>
             <button onclick="button2()"> Получить </button>
         </p>


    
         <p>По цене от <select name="min_price" id="min_price">
                 <?php
                    $sqlSelect = "SELECT DISTINCT price FROM $db.items";
                    $document = $dbh->query($sqlSelect);
                    foreach ($document as $cell) {
                        echo "<option>";
                        print($cell[0]);
                        echo "</option>";
                    }
                    ?>
             </select>
             до <select name="max_price" id="max_price">
                 <?php
                    $sqlSelect = "SELECT DISTINCT * FROM $db.items";
                    $document = $dbh->query($sqlSelect);
                    foreach ($document as $cell) {
                        echo "<option>";
                        print($cell[2]);
                        echo "</option>";
                    }
                    ?>
         </p>
         </select>
         <button onclick="button3()"> Получить </button>
    <p id="result">     
 </body>

 </html>