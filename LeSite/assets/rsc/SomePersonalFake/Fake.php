    
    <script type="text/javascript">
        function testificate()
        {
            if ($('#test').attr("data-id") == "1") {
                $('#test').attr("data-id","0");
                $('#test').html("TestON");
                $('#test').css("color","green");
            }else{
                $('#test').attr("data-id","1");
                $('#test').html("TestOFF");
                $('#test').css("color","red");
            }
        }
        function fakeValid(){
            var testId = $('#test').attr("data-id");
            var request = $.ajax({
                url: "./assets/rsc/SomePersonalFake/Fake_modif.php",
                method: "POST",
                data: { id : testId },
                dataType: "html",
                success:function(msg) {
                            $('#test').html(msg);
                        },
                error:   function( jqXHR, textStatus ) {
                            $('body').html("Request failed: " + jqXHR.responseText);
                        }
            });

            // request.done(function(msg) {
            //   alert("Okay: " + msg);
            // });
             
            // request.fail(function( jqXHR, textStatus ) {
            //   alert( "Request failed: " + textStatus );
            // });
        }

    </script>
    <div id="test" data-id="1" style="color: red;">TestOFF</div>
    <button onclick="testificate()">TEST</button>
    <hr>
    <button onclick="fakeValid()">Fake_valid</button>
    <hr>

    <div class="container">
    
    <h2><p class="text-center text-uppercase"><strong>Près de 8,7 millions d’espèces vivent sur Terre</strong></p></h2>

    <div class="post-body__content"><p><strong>Notre planète compte environ 8,7 millions d'espèces vivantes, dont 6,5 millions évoluent sur la terre ferme et 2,2 millions en milieu aquatique, selon l'estimation la plus précise jamais effectuée et publiée mardi aux États-Unis<em>.</em></strong></p><p>La Terre est une planète véritablement accueillante. En effet, selon une étude publiée mardi dans la revue américaine <em>PLoS Biology</em>, notre environnement compterait aujourd'hui à peu près 8,7 millions d'espèces vivantes, dont 6,5 millions seraient terrestres et 2,2 millions aquatiques. Des chiffres que les scientifiques avaient jusqu'à présent beaucoup de mal à évaluer, alors que seuls 1,23 million d'espèces ont été découvertes, décrites et cataloguées, soit 14,1% du total réel.Pour faire une telle estimation, les chercheurs du "Census of Marine Life" (le recensement de la vie marine) se sont en fait basés sur les dernières techniques éprouvées de taxonomie, la science qui regroupe, nomme et classe les organismes vivants au sein d’entitées appelées taxon. Les résultats d'analyse obtenus ont alors permis de resserrer considérablement les chiffres avancés par les précédentes études qui variaient de trois à cent millions d’espèces vivantes.</p><p><strong>Il reste encore beaucoup à étudier</strong></p><p>Plus en détail, les estimations des chercheurs portent à 7,77  millions au total le nombre d'espèces animales, dont 953.434 ont été pu  être décrites et classées. En ce qui concerne les espèces végétales,  215.644 ont été cataloguées sur les 298.000 existantes à ce jour. Par  ailleurs, il existe, selon l'étude, 611.000 espèces de champignons et  moisissures, dont seuls 43.271 ont fait l'objet d'une classification.</p><p>Viennent  ensuite les 36.400 espèces de protozoaires, des organismes  unicellulaires dotés de certains comportements animaux, comme le  mouvement. Sur ce nombre, 8.118 ont été répertoriées à ce jour. Enfin,  27.500 espèces d'algues, de diatomées (micro algue unicellulaire)  et de  moisissures d'eau ont été estimées. Parmi celles-ci, ce sont  13.033  espèces qui ont été identifiées et cataloguées.&nbsp; </p><p><em>" La question de savoir combien d’espèces vivantes existent sur la Terre a intrigué les scientifiques depuis des siècles et cette réponse, couplée à d’autres recherches sur la distribution et l’abondance des espèces, est particulièrement importante car les activités humaines et leur impact accélèrent le taux d’extinction",</em> a expliqué Camilo Mora, des Universités de Hawaii et de Dalhousie à Halifax au Canada, et principal auteur de l’étude. Il souligne ainsi que <em> "nombre d'espèces pourraient disparaître avant même que nous en connaissions l'existence, leur fonction unique dans l'écosystème et leur contribution potentielle pour améliorer le bien-être des humains".</em></p><p>Un point d'autant plus important que la récente mise à jour de "la Liste Rouge" établie par l’Union internationale pour la conservation de la nature (UICN) fait état de 59.508 espèces surveillées dont 19.625 sont menacées d'extinction, relève Boris Worn, de l'Université Dalhousie, co-auteur de cette communication. Des chiffres qui suggèrent que moins d’une espèce sur cent est surveillée sur la Planète. </p></div>
    </div>