<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- ========== Tailwind Css ========  -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- ========== AwesomeFonts Css ========  -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css" rel="stylesheet" />

    <script src="https://kit.fontawesome.com/d0fb25e48c.js" crossorigin="anonymous"></script>



</head>

<body>

    <section class=" flex items-center relative">

        <!-- =========== Aside bar =========== -->
        <aside class="bg-green-700 h-[100vh] w-[20%] sm:w-[320px] sm:p-5">
            <!-- ===== logo ===== -->

            <ul class="p-5 mt-10">

                <h2 class="text-base sm:text-2xl font-bold sm:my-5 text-white">
                    WIKI
                </h2>
                <li class="my-2">
                    <a href="../category/displayCategory.php"
                        class="text-lg font-medium w-[full] rounded-md h-[60px] text-white flex items-center p-5 group hover:text-black bg-indigo-200 bg-opacity-20">
                        <img class="h-8 sm:w-8 w-full" src="../../../../public/images/categories.png" alt=""> <span
                            class="hidden sm:inline-block">Categories</span></a>
                </li>
                <li class="my-2">
                    <a href="../tag/displayTag.php"
                        class="text-lg font-medium w-[full] rounded-md h-[60px] text-white flex items-center p-5 group hover:text-black bg-indigo-200 bg-opacity-20">
                        <img class="h-8 sm:w-8 w-full" src="../../../../public/images/tags.png" alt=""><span
                            class="hidden sm:inline-block">Tags</span></a>
                </li>


                <li class="my-2">
                    <a href="../wiki/displayWiki.php"
                        class="text-lg font-medium w-[full] rounded-md h-[60px] text-white flex items-center p-5 group hover:text-black bg-indigo-200 bg-opacity-20">
                        <img class="h-8 sm:w-8 w-full" src="../../../../public/images/wiki.png" alt=""><span
                            class="hidden sm:inline-block">Wikis</span></a>
                </li>
                <li class="my-2">
                    <a href="../archive/archiveWiki.php"
                        class="text-lg font-medium w-[full] rounded-md h-[60px] text-white flex items-center p-5 group hover:text-black bg-indigo-200 bg-opacity-20">
                        <i class="fa-solid "></i>
                        <img class="h-8 sm:w-8 w-full" src="../../../../public/images/archive.png" alt=""><span
                            class="hidden sm:inline-block">Archive</span></a>
                </li>






                <li> <a href="ClientUI/allFolder/home.php"
                        class="bg-[#B5CB99] h-10 w-[50%] sm:w-full flex justify-center items-center rounded-lg text-[#0F1A19] font-bold m-auto mt-10"><button
                            type="button"><i class="fa-solid fa-arrow-right-from-bracket fa-rotate-180"></i></i> <span
                                class="hidden sm:inline-block">LOG
                                OUT</span></button></a></li>
            </ul>




        </aside>
        <!-- =========== Aside bar =========== -->
        <!-- =========== Content =========== -->
        <main class="bg-gray-100 flex-grow h-[100vh] relative">
            <!-- ============== header =========== -->