$(document).ready(function(){

    function latest(){
        $('#content-wrapper').html('');
        $('#content-wrapper').append(`<h2 class="mb-4 text-2xl lg:text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white lg:col-span-2">Latest Wikis</h2>`);

        $.ajax({
            url: URLROOT + '/wikis/displayTruncated',
            type: 'GET',
            success: function(response){
                let data = JSON.parse(response); 
                let element = '';
                // console.log(data);
                data.forEach((e) => {
                    element = $('<article>', {class: 'p-6 bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700'});
                    let content = `<div class="flex justify-between items-center mb-5 text-gray-500">
                                        <span class="bg-primary-100 text-primary-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded dark:bg-primary-200 dark:text-primary-800">
                                            <svg class="mr-1 w-3 h-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M2 5a2 2 0 012-2h8a2 2 0 012 2v10a2 2 0 002 2H4a2 2 0 01-2-2V5zm3 1h6v4H5V6zm6 6H5v2h6v-2z" clip-rule="evenodd"></path><path d="M15 7h1a2 2 0 012 2v5.5a1.5 1.5 0 01-3 0V7z"></path></svg>
                                            ${e.category_name}
                                        </span>
                                        <span class="text-sm">${e.dateModified}</span>
                                    </div>
                                    <h2 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white"><a href="#">${e.title}</a></h2>
                                    <p class="mb-5 font-light text-gray-500 dark:text-gray-400">${e.content.substring(0,50)}...</p>
                                    <div class="flex justify-between items-center">
                                        <div class="flex items-center space-x-4">
                                            <img class="w-7 h-7 rounded-full" src="${URLROOT}/uploads/${e.user_picture}" alt="Jese Leos avatar" />
                                            <span class="font-medium dark:text-white">
                                                ${e.author}
                                            </span>
                                        </div>
                                        <a href="${URLROOT}/wikis/single/${e.id}" class="inline-flex items-center font-medium text-primary-600 dark:text-primary-500 hover:underline">
                                            Read more
                                            <svg class="ml-2 w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                        </a>
                                    </div>`;
                    element.append(content);
                    $('#content-wrapper').append(element);
                });
            }
        });

        $('#subcontent-wrapper').html('');

        $('#subcontent-wrapper').html('<h2 class="mb-4 text-2xl lg:text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white lg:col-span-1">Latest Categories</h2>');

        $.ajax({
            url: URLROOT + '/categories/display',
            type: 'GET',
            async: false,
            success: function(response){
                let data = JSON.parse(response); 
                let element = '';
                // console.log(data);

                for(let i = 0; i < 3; i++){
                    let content = `<div class="p-6 bg-white text-xl rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
                                        ${data[i].name}
                                    </div> `;
                    $('#subcontent-wrapper').append(content);
                }
            }
        });

        $('#subcontent-wrapper').append('<h2 class="mb-4 mt-16 text-2xl lg:text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white lg:col-span-1">Latest Tags</h2>');

        $.ajax({
            url: URLROOT + '/tags/display',
            type: 'GET',
            async: false,
            success: function(response){
                let data = JSON.parse(response);
                element = $('<div>', {class: 'p-6 bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700 grid gap-8 md:grid-cols-2'});
                // console.log(data);
                for (let i = 0; i < 4; i++){
                    content = `<div class="p-6 bg-white text-xl rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
                                        ${data[i].name}
                                    </div> `;
                    element.append(content);
                }
                $('#subcontent-wrapper').append(element);
            }
        });
    }

    latest();

    $(document).on('input', '#search-navbar', function(e){
        if($('#search-navbar').val().trim() != ''){
            let string = $('#search-navbar').val();
            // console.log($('#search-navbar').val());

            $('#content-wrapper').html('');
            $('#content-wrapper').append(`<h2 class="mb-4 text-2xl lg:text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white lg:col-span-2">Searched Wikis</h2>`);

            $.ajax({
                url: URLROOT + '/wikis/search/' + string,
                type: 'GET',
                success: function(response){
                    let data = JSON.parse(response); 
                    let element = '';
                    // console.log(data);
                    data.forEach((e) => {
                        element = $('<article>', {class: 'p-6 bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700'});
                        let content = `<div class="flex justify-between items-center mb-5 text-gray-500">
                                            <span class="bg-primary-100 text-primary-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded dark:bg-primary-200 dark:text-primary-800">
                                                <svg class="mr-1 w-3 h-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M2 5a2 2 0 012-2h8a2 2 0 012 2v10a2 2 0 002 2H4a2 2 0 01-2-2V5zm3 1h6v4H5V6zm6 6H5v2h6v-2z" clip-rule="evenodd"></path><path d="M15 7h1a2 2 0 012 2v5.5a1.5 1.5 0 01-3 0V7z"></path></svg>
                                                ${e.category_name}
                                            </span>
                                            <span class="text-sm">${e.dateModified}</span>
                                        </div>
                                        <h2 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white"><a href="#">${e.title}</a></h2>
                                        <p class="mb-5 font-light text-gray-500 dark:text-gray-400">${e.content.substring(0,50)}...</p>
                                        <div class="flex justify-between items-center">
                                            <div class="flex items-center space-x-4">
                                                <img class="w-7 h-7 rounded-full" src="${URLROOT}/uploads/${e.user_picture}" alt="Jese Leos avatar" />
                                                <span class="font-medium dark:text-white">
                                                    ${e.author}
                                                </span>
                                            </div>
                                            <a href="${URLROOT}/wikis/single/${e.id}" class="inline-flex items-center font-medium text-primary-600 dark:text-primary-500 hover:underline">
                                                Read more
                                                <svg class="ml-2 w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                            </a>
                                        </div>`;
                        element.append(content);
                        $('#content-wrapper').append(element);
                    });
                }
            });

            $('#subcontent-wrapper').html('');

            $('#subcontent-wrapper').html('<h2 class="mb-4 text-2xl lg:text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white lg:col-span-1">Searched Categories</h2>');
            $.ajax({
                url: URLROOT + '/categories/search/' + string,
                type: 'GET',
                async: false,
                success: function(response){
                    let data = JSON.parse(response); 
                    let element = '';
                    // console.log(data);
                    if(data){
                        data.forEach((e) => {
                            let content = `<div class="p-6 bg-white text-xl rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
                                                ${e.name}
                                            </div> `;
                            $('#subcontent-wrapper').append(content);
                        })
                    } else {
                        console.log(1);
                    }
                }
            });

            $('#subcontent-wrapper').append('<h2 class="mb-4 mt-16 text-2xl lg:text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white lg:col-span-1">Searched Tags</h2>');

            $.ajax({
                url: URLROOT + '/tags/search/' + string,
                type: 'GET',
                async: false,
                success: function(response){
                    let data = JSON.parse(response);
                    element = $('<div>', {class: 'p-6 bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700 grid gap-8 md:grid-cols-2'});
                    // console.log(data);
                    data.forEach((e) => {
                        content = `<div class="p-6 bg-white text-xl rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
                                            ${e.name}
                                        </div> `;
                        element.append(content);
                    })
                    $('#subcontent-wrapper').append(element);
                }
            });
        } else {
            latest();
        }

    });

})