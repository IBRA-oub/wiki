<?php
session_start();
if($_SESSION['role'] !== 'admin'){
    header('Location:../../login.php ');
}
require_once '../../sidebar.php';
require_once'../../../Controllers/WikiController/displayArchivedWikiController.php';
?>


<!-- =========== Content =========== -->
<main class="bg-gray-100 flex-grow h-[100vh] relative">
    <!-- ============== header =========== -->

    <!--===========Content===========-->
    <main class="bg-gray-100 flex-grow h-[100vh] relative">
        <!-- ============== header =========== -->

        <!-- ============ Content ============= -->



        <!-- ========== table Banks-desktop ======== -->

        <div class="hidden md:block  rounded-lg overflow-hidden mt-10">
            <table class=" 
           w-full   " id="table1">
                <thead class="  sm:w-full">
                    <tr class="bg-green-700 text-white h-[60px]">
                        <th class="">ID</th>
                        <th class="">title</th>
                        <th class="">summarize</th>
                        <th class="">content</th>
                        <th class="">dateCreate</th>
                        <th class="">dateModifie</th>
                        <th class="">picture</th>
                        <th class="">Actions</th>
                    </tr>
                </thead>
                <tbody class="sm:w-full">

                    <?php 
              foreach($WikiDatas as $WikiData) {
              ?>
                    <tr class=" pt-10 sm:pt-0  w-full ">

                        <td class=" sm:text-center text-right">
                            <?php echo  $WikiData['idWiki'] ?>
                        </td>
                        <td class=" sm:text-center text-right">
                            <?php echo $WikiData['title'] ?>
                        </td>

                        <td class=" sm:text-center text-right">
                            <?php echo $WikiData['summarize'] ?>
                        </td>
                        <td class=" sm:text-center text-right">
                            <?php echo $WikiData['content'] ?>
                        </td>
                        <td class=" sm:text-center text-right">
                            <?php echo $WikiData['dateCreated'] ?>
                        </td>
                        <td class=" sm:text-center text-right">
                            <?php echo $WikiData['dateModified'] ?>
                        </td>
                        <td class=" sm:text-center text-right">
                            <div class="flex items-center justify-center">
                                <?php
                                            $cheminImage = $WikiData['pictureWiki'] ;
                                            echo "<img class='w-[50px] h-[50px] ' src='$cheminImage' alt='image de categorie'>";
                                            ?>
                            </div>
                        </td>
                        <td class=" sm:text-center text-right">

                            <button class="bg-slate-900 text-white w-[35px] h-[35px] rounded-md">
                                <a
                                    href="../../../Controllers/WikiController/NonArchivedWikiController.php?idWiki=<?= $WikiData['idWiki'];?>">
                                    <i class="fa-solid fa-xmark"></i></a>

                            </button>



                        </td>

                    </tr>
                    <?php 
                                    }
                                    ?>

                </tbody>
            </table>
        </div>
        <!-- ========== table Banks-mobile ======== -->
        <div class="block sm:hidden rounded-lg overflow-hidden mt-10">
            <table class=" block w-full  border-2 sm:border-0  " id="table2">
                <thead class="hidden">
                    <tr>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>


                    </tr>
                </thead>
                <tbody class="block  w-full">
                    <?php 
                foreach($WikiDatas as $WikiData) {
              ?>
                    <tr class="block pt-10 sm:pt-0   w-full ">

                        <td data-label="id"
                            class="border-b before:content-['id']  before:absolute before:left-0 before:w-1/2 before:font-bold before:text-left before:pl-2 sm:before:hidden sm:text-center block    text-right">
                            <?php echo  $WikiData['idWiki'] ?>
                        </td>
                        <td data-label="title" class="border-b before:content-['title'] before:absolute before:left-0 before:w-1/2 before:font-bold before:text-left before:pl-2 block  sm:before:hidden sm:text-center 
                             text-right">
                            <?php echo  $WikiData['title'] ?>
                        </td>
                        <td data-label="sammurize" class=" before:content-['sammurize'] before:absolute before:left-0 before:w-1/2 before:font-bold before:text-left before:pl-2 block  sm:before:hidden sm:text-center 
                             text-right">
                            <div class="h-8"></div>

                        </td>
                        <td data-label="sammurize" class="border-b  before:absolute before:left-0 before:w-1/2 before:font-bold before:text-left before:pl-2 block  sm:before:hidden sm:text-center 
                             text-right">
                            <?php echo  $WikiData['summarize'] ?>
                        </td>
                        <td data-label="content" class=" before:content-['content'] before:absolute before:left-0 before:w-1/2 before:font-bold before:text-left before:pl-2 block  sm:before:hidden sm:text-center 
                             text-right">
                            <div class="h-8"></div>

                        </td>
                        <td data-label="content" class="border-b  before:absolute before:left-0 before:w-1/2 before:font-bold before:text-left before:pl-2 block  sm:before:hidden sm:text-center 
                             text-right">
                            <?php echo $WikiData['content'] ?>
                        </td>
                        <td data-label="picture" class="border-b before:content-['dateCreted'] before:absolute before:left-0 before:w-1/2 before:font-bold before:text-left before:pl-2 block  sm:before:hidden sm:text-center 
                             text-right">
                            <?php echo $WikiData['dateCreated'] ?>
                        </td>
                        <td data-label="picture" class="border-b before:content-['dateModified'] before:absolute before:left-0 before:w-1/2 before:font-bold before:text-left before:pl-2 block  sm:before:hidden sm:text-center 
                             text-right">
                            <?php echo $WikiData['dateModified'] ?>
                        </td>
                        <td data-label="picture" class="border-b before:content-['dateModified'] before:absolute before:left-0 before:w-1/2 before:font-bold before:text-left before:pl-2 block  sm:before:hidden sm:text-center 
                             text-right">
                            <div class="flex items-center justify-center">
                                <?php
                                            $cheminImage = $WikiData['pictureWiki'] ;
                                            echo "<img class='w-[50px] h-[50px] ' src='$cheminImage' alt='image de categorie'>";
                                            ?>
                            </div>
                        </td>

                        <td data-label="ACtion"
                            class="border-b before:content-['action'] before:absolute before:left-0 before:w-1/2 before:font-bold before:text-left before:pl-2  sm:before:hidden  sm:text-center block    text-right">

                            <button class="bg-slate-900 text-white w-[35px] h-[35px] rounded-md">
                                <a
                                    href="../../../Controllers/WikiController/NonArchivedWikiController.php?idWiki=<?= $WikiData['idWiki'];;?>">
                                    <i class="fa-solid fa-xmark"></i></a>

                            </button>



                        </td>

                    </tr>
                    <?php 
              }
              ?>

                </tbody>
            </table>
        </div>



        </div>
        <!-- ============ Content ============= -->


    </main>
    <!-- ========== overlay ================= -->

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/v/dt/dt-1.13.8/datatables.min.js"></script>

    <script>
    $(document).ready(function() {
        $('#table1').DataTable();

    });
    $(document).ready(function() {
        $('#table2').DataTable();

    });
    </script>


    </script>

    </body>

    </html>