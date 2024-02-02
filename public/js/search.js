document.addEventListener("DOMContentLoaded", function () {
    let input = "";
    
    // Ajout d'un gestionnaire d'événements pour le blur (perte de focus) du champ de recherche
    document.getElementById("search-navbar").addEventListener("blur", function () {
      if (this.value.trim() === "") {
        // Rafraîchir la page si le champ de recherche est vide
        window.location.reload();
      }
    });
  
    // Ajout d'un gestionnaire d'événements pour l'input (saisie) dans le champ de recherche
    document.getElementById("search-navbar").addEventListener("input", function () {
      
        input = this.value;
  
        // Requête AJAX pour les wikis
        var wikiRequest = new XMLHttpRequest();
        wikiRequest.open("GET", "http://localhost/wiki/app/Controllers/WikiController/displaySearchedWikiController.php?search=" + input, true);
        wikiRequest.onreadystatechange = function () {
          if (wikiRequest.readyState == 4 && wikiRequest.status == 200) {
            var data = JSON.parse(wikiRequest.responseText);
            // console.log(data);
            document.getElementById("wiki-wrapper").innerHTML = "";
  
            // Boucle à travers les données de la réponse pour afficher les wikis
            data.forEach(function (e) {
              var wikiWrapper = document.getElementById("wiki-wrapper");
  
              var wikiDiv = document.createElement("div");
              wikiDiv.className = "mb-4 lg:mb-10 p-4 lg:p-0 w-full md:w-4/7 relative rounded block";
  
              var img = document.createElement("img");
              img.src = e.pictureWiki;
              img.className = "rounded-md object-cover w-full h-64";
              
              var flexDiv = document.createElement("div");
              flexDiv.className = "flex";
  
              var span1 = document.createElement("span");
              span1.className = "text-gray-700 text-sm hidden md:block mt-4";
              span1.textContent = "dateCreate:" + e.dateCreated;
  
              var span2 = document.createElement("span");
              span2.className = "text-gray-700 text-sm hidden md:block mt-4";
              span2.textContent = " | dateModified: " + e.dateModified;
  
              var h1 = document.createElement("h1");
              h1.className = "text-gray-800 text-4xl font-bold mt-2 mb-2 leading-tight";
              h1.textContent = e.title;
  
              var p = document.createElement("p");
              p.className = "text-gray-600 mb-4";
              p.textContent = e.summarize;
  
              var a = document.createElement("a");
              a.href = "http://localhost/wiki/app/Views/ClientUI/allFolder/wikiDetaille.php?idWiki=" + e.idWiki;
              a.className = "inline-block px-6 py-3 mt-2 rounded-md bg-green-700 text-gray-100";
              a.textContent = "Read more";
  
              flexDiv.appendChild(span1);
              flexDiv.appendChild(span2);
  
              wikiDiv.appendChild(img);
              wikiDiv.appendChild(flexDiv);
              wikiDiv.appendChild(h1);
              wikiDiv.appendChild(p);
              wikiDiv.appendChild(a);
  
              wikiWrapper.appendChild(wikiDiv);
            });
          }
        };
        wikiRequest.send();
  
        // Requête AJAX pour les catégories
        var categoryRequest = new XMLHttpRequest();
        categoryRequest.open("GET", "http://localhost/wiki/app/Controllers/CategoryController/displaySearchCategory.php?search=" + input, true);
        categoryRequest.onreadystatechange = function () {
          if (categoryRequest.readyState == 4 && categoryRequest.status == 200) {
            var data = JSON.parse(categoryRequest.responseText);
            // console.log(data);
            document.getElementById("category-wrapper").innerHTML = "";
  
            // Boucle à travers les données de la réponse pour afficher les catégories
            data.forEach(function (e) {
              var categoryWrapper = document.getElementById("category-wrapper");
  
              var categoryDiv = document.createElement("div");
              categoryDiv.className = "w-full md:w-4/7 rounded mb-10 flex flex-col md:flex-row";
  
              var img = document.createElement("img");
              img.src = e.pictureCategory;
              img.className = "block md:hidden lg:block rounded-md h-64 md:h-32 m-4 md:m-0";
  
              var bgDiv = document.createElement("div");
              bgDiv.className = "bg-white rounded px-4";
  
              var span = document.createElement("span");
              span.className = "text-green-700 text-sm hidden md:block";
              span.textContent = e.nameCategory;
  
              var div = document.createElement("div");
              div.className = "md:mt-0 text-gray-800 font-semibold text-xl mb-2";
              div.textContent = e.description;
  
              var a = document.createElement("a");
              a.href = "http://localhost/wiki/app/Views/ClientUI/allFolder/wikiOfCategory.php?idCategory=" + e.idCategory;
              a.className = "inline-block px-4 mt-2 rounded-md bg-green-700 text-gray-100 text-base";
              a.textContent = "show Wiki";
  
              bgDiv.appendChild(span);
              bgDiv.appendChild(div);
              bgDiv.appendChild(a);
  
              categoryDiv.appendChild(img);
              categoryDiv.appendChild(bgDiv);
  
              categoryWrapper.appendChild(categoryDiv);
            });
          }
        };
        categoryRequest.send();
  
        // Requête AJAX pour les tags
        var tagRequest = new XMLHttpRequest();
        tagRequest.open("GET", "http://localhost/wiki/app/Controllers/TagController/displaySearchTag.php?search=" + input, true);
        tagRequest.onreadystatechange = function () {
          if (tagRequest.readyState == 4 && tagRequest.status == 200) {
            var data = JSON.parse(tagRequest.responseText);
            // console.log(data);
            document.getElementById("tag-wrapper").innerHTML = "";
  
            // Boucle à travers les données de la réponse pour afficher les tags
            data.forEach(function (e) {
              var tagWrapper = document.getElementById("tag-wrapper");
  
              var span = document.createElement("span");
              span.className = "ml-4 px-2 py-1 bg-gray-300 text-gray-800 rounded-full mr-2";
              span.textContent = "#" + e.nameTag;
  
              tagWrapper.appendChild(span);
            });
          }
        };
        tagRequest.send();
     
    });
  });
  