<!-- <pre> -->
<?php

if (isset($_REQUEST['search']) && !empty($_REQUEST['srchdata'])) {
    $srchData = $_REQUEST['srchdata'];

    $curl = curl_init();

    curl_setopt_array($curl, [
        CURLOPT_URL => "https://imdb8.p.rapidapi.com/auto-complete?q=$srchData",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => [
            "X-RapidAPI-Host: imdb8.p.rapidapi.com",
            "X-RapidAPI-Key: c66530c790msh1ae06ae0d1454fep17321ejsnc8051f2d6e38"
        ],
    ]);
} else {

    $curl = curl_init();

    curl_setopt_array($curl, [
        CURLOPT_URL => "https://imdb8.p.rapidapi.com/auto-complete?q='i'",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => [
            "X-RapidAPI-Host: imdb8.p.rapidapi.com",
            "X-RapidAPI-Key: c66530c790msh1ae06ae0d1454fep17321ejsnc8051f2d6e38"
        ],
    ]);
}


$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
    echo "cURL Error #:" . $err;
} else {
    $images = array();
    $allData = array();
    $data = json_decode($response, true);
    $arr1 = $data['d'];
    foreach ($arr1 as $data => $val) {
        $allData[] = $val;
        if (isset($val['i'])) {
            $images[] = $val['i'];
        }
    }
    foreach ($arr1 as $data => $val) {
        if (isset($val['i'])) {
            unset($val['i']);
            $otherData[] = $val;
        }
    }
}

$curl = curl_init();

curl_setopt_array($curl, [
    CURLOPT_URL => "https://imdb8.p.rapidapi.com/title/list-popular-genres",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => [
        "X-RapidAPI-Host: imdb8.p.rapidapi.com",
        "X-RapidAPI-Key: c66530c790msh1ae06ae0d1454fep17321ejsnc8051f2d6e38"
    ],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
    echo "cURL Error #:" . $err;
} else {
    $data = json_decode($response);
}
foreach ($data->genres as $key => $value) {
    $value->description;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tw-elements/dist/css/index.min.css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="style.css">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                    },
                }
            }
        }
    </script>
    <title>IMDB Home</title>
</head>

<body>
    <nav class="relative w-full flex flex-wrap items-center justify-between py-3 bg-gray-900 text-gray-200 shadow-lg navbar navbar-expand-lg navbar-light">
        <?php
        include("./commons/navbar.php");
        ?>
        <!-- Collapsible wrapper -->

        <!-- Right elements -->
        <div class="flex items-center relative">
            <div class="flex justify-center">
                <div class="xl:w-96">
                    <form class="input-group relative flex flex-wrap items-stretch w-full rounded" method="POST">
                        <input type="text" name="srchdata" class="form-control relative flex-auto min-w-0 block w-full px-3 py-1.5 text-base font-normal text-yellow-600 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" placeholder="Search" aria-label="Search" aria-describedby="button-addon2">
                        <span class="input-group-text flex items-center px-3 py-1.5 cursor-pointer text-base font-normal text-black text-center whitespace-nowrap rounded bg-amber-400" id="basic-addon2">
                            <input type="submit" name="search" value="Search" class="cursor-pointer ">
                        </span>
                    </form>
                </div>
            </div>
        </div>
        <!-- Right elements -->
        </div>
    </nav>

    <?php
    foreach ($data->genres as $key => $value) {
    }
    ?>
    <nav class="navbar navbar-expand-lg shadow-lg py-2 bg-[#353535] relative flex items-center w-full justify-between">
        <div class="px-6">
            <button class="navbar-toggler border-0 py-3 lg:hidden leading-none text-xl bg-transparent text-gray-600 hover:text-gray-700 focus:text-gray-700 transition-shadow duration-150 ease-in-out" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContentX" aria-controls="navbarSupportedContentX" aria-expanded="false" aria-label="Toggle navigation">
                <svg aria-hidden="true" focusable="false" data-prefix="fas" class="w-5" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                    <path fill="currentColor" d="M16 132h416c8.837 0 16-7.163 16-16V76c0-8.837-7.163-16-16-16H16C7.163 60 0 67.163 0 76v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16z"></path>
                </svg>
            </button>
            <div class="navbar-collapse collapse grow items-center" id="navbarSupportedContentX">
                <ul class="navbar-nav mr-auto flex flex-row">
                    <li class="nav-item dropdown static">
                        <a class="nav-link block pr-2 lg:px-2 py-2 text-[#fcfcfc] hover:text-white focus:text-[#fcfcfc] transition duration-150 ease-in-out dropdown-toggle flex items-center whitespace-nowrap" href="#" data-mdb-ripple="true" data-mdb-ripple-color="light" type="button" id="dropdownMenuButtonX" data-bs-toggle="dropdown" aria-expanded="false">Generes
                            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="caret-down" class="w-2 ml-2" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
                                <path fill="currentColor" d="M31.3 192h257.3c17.8 0 26.7 21.5 14.1 34.1L174.1 354.8c-7.8 7.8-20.5 7.8-28.3 0L17.2 226.1C4.6 213.5 13.5 192 31.3 192z"></path>
                            </svg>
                        </a>
                        <div class="dropdown-menu w-full mt-0 hidden shadow-lg bg-[#353535] absolute left-0 top-full" aria-labelledby="dropdownMenuButtonX">
                            <div class="px-6 lg:px-8 py-5">
                                <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                                    <?php
                                    $counter = 0;
                                    foreach ($data->genres as $key => $value) {
                                        if ($counter == 0 || $counter % 6 == 0) {
                                    ?>
                                            <div class="bg-[#353535] text-gray-600">
                                            <?php
                                        }
                                            ?>
                                            <a href="#!" aria-current="true" class="block px-6 py-2 border-b border-[#252525] w-full text-[#fcfcfc] hover:bg-[#252525] hover:text-white transition duration-150 ease-in-out"><?php echo $value->description ?></a>
                                            <?php
                                            if ($counter % 6 == 0) {
                                            ?>
                                            </div>
                                    <?php
                                            }
                                            $counter++;
                                        }
                                    ?>
                                    <!-- </div>
                                <div class="bg-white text-gray-600">
                                    <a href="#!" aria-current="true" class="block px-6 py-2 border-b border-gray-200 w-full hover:bg-gray-50 hover:text-gray-700 transition duration-150 ease-in-out">Explit voluptas</a>
                                    <a href="#!" aria-current="true" class="block px-6 py-2 border-b border-gray-200 w-full hover:bg-gray-50 hover:text-gray-700 transition duration-150 ease-in-out">Perspiciatis quo</a>
                                    <a href="#!" aria-current="true" class="block px-6 py-2 border-b border-gray-200 w-full hover:bg-gray-50 hover:text-gray-700 transition duration-150 ease-in-out">Cras justo odio</a>
                                    <a href="#!" aria-current="true" class="block px-6 py-2 border-b border-gray-200 w-full hover:bg-gray-50 hover:text-gray-700 transition duration-150 ease-in-out">Laudant maiores</a>
                                    <a href="#!" aria-current="true" class="block px-6 py-2 w-full hover:bg-gray-50 hover:text-gray-700 transition duration-150 ease-in-out">Provident dolor</a>
                                    <a href="#!" aria-current="true" class="block px-6 py-2 w-full hover:bg-gray-50 hover:text-gray-700 transition duration-150 ease-in-out">Provident dolor</a>
                                </div>
                                <div class="bg-white text-gray-600">
                                    <a href="#!" aria-current="true" class="block px-6 py-2 border-b border-gray-200 w-full hover:bg-gray-50 hover:text-gray-700 transition duration-150 ease-in-out">Iste quaerato</a>
                                    <a href="#!" aria-current="true" class="block px-6 py-2 border-b border-gray-200 w-full hover:bg-gray-50 hover:text-gray-700 transition duration-150 ease-in-out">Cras justo odio</a>
                                    <a href="#!" aria-current="true" class="block px-6 py-2 border-b border-gray-200 w-full hover:bg-gray-50 hover:text-gray-700 transition duration-150 ease-in-out">Est iure</a>
                                    <a href="#!" aria-current="true" class="block px-6 py-2 border-b border-gray-200 w-full hover:bg-gray-50 hover:text-gray-700 transition duration-150 ease-in-out">Praesentium</a>
                                    <a href="#!" aria-current="true" class="block px-6 py-2 w-full hover:bg-gray-50 hover:text-gray-700 transition duration-150 ease-in-out">Laboriosam</a>
                                    <a href="#!" aria-current="true" class="block px-6 py-2 w-full hover:bg-gray-50 hover:text-gray-700 transition duration-150 ease-in-out">Laboriosam</a>
                                </div>
                                <div class="bg-white text-gray-600">
                                    <a href="#!" aria-current="true" class="block px-6 py-2 border-b border-gray-200 w-full hover:bg-gray-50 hover:text-gray-700 transition duration-150 ease-in-out">Cras justo odio</a>
                                    <a href="#!" aria-current="true" class="block px-6 py-2 border-b border-gray-200 w-full hover:bg-gray-50 hover:text-gray-700 transition duration-150 ease-in-out">Saepe</a>
                                    <a href="#!" aria-current="true" class="block px-6 py-2 border-b border-gray-200 w-full hover:bg-gray-50 hover:text-gray-700 transition duration-150 ease-in-out">Vel alias</a>
                                    <a href="#!" aria-current="true" class="block px-6 py-2 border-b border-gray-200 w-full hover:bg-gray-50 hover:text-gray-700 transition duration-150 ease-in-out">Sunt doloribus</a>
                                    <a href="#!" aria-current="true" class="block px-6 py-2 w-full hover:bg-gray-50 hover:text-gray-700 transition duration-150 ease-in-out">Cum dolores</a>
                                    <a href="#!" aria-current="true" class="block px-6 py-2 w-full hover:bg-gray-50 hover:text-gray-700 transition duration-150 ease-in-out">Cum dolores</a>
                                </div> -->
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <section class="overflow-hidden text-gray-700 ">
        <div class="container px-5 py-2 mx-auto lg:pt-12 lg:px-14">
            <div class="flex flex-wrap -m-1 md:-m-2">
                <?php
                $count = 0;
                foreach ($images as $img) {
                ?>
                    <div class="flex flex-wrap w-1/3">
                        <div class="w-full p-1 md:p-2 mx-5 my-5">
                            <a href="./details.php?titleid=<?php echo ((isset($otherData[$count]['id']))) ?  ($otherData[$count]['id']) : ("No Data found") ?>">
                                <img alt="gallery" class="block object-cover object-center w-full h-[500px] rounded-lg" src="<?php echo $img['imageUrl'] ?>">
                            </a>
                            <table class="w-full p-1 md:p-2 mx-5 my-5">
                                <tr>
                                    <th colspan="2" class="font-semibold text-xl leading-10"><?php echo ((isset($otherData[$count]['l']))) ?  ($otherData[$count]['l']) : ("No Data found") ?></th>
                                </tr>
                                <tr>
                                    <td class="text-sm">Rank : </td>
                                    <td class="text-sm"><?php echo ((isset($otherData[$count]['rank']))) ?  ($otherData[$count]['rank']) : ("No Data found") ?></td>
                                </tr>
                                <tr>
                                    <td class="text-sm">Type : </td>
                                    <td class="text-sm"><?php echo ((isset($otherData[$count]['qid']))) ?  ($otherData[$count]['qid']) : ("No Data found")  ?></td>
                                </tr>
                                <tr>
                                    <td width="20%" class="text-sm">Cast : </td>
                                    <td class="text-sm"><?php echo ((isset($otherData[$count]['s']))) ?  ($otherData[$count]['s']) : ("No Data found")  ?></td>
                                </tr>
                                <tr>
                                    <td class="text-sm">Year : </td>
                                    <td class="text-sm"><?php echo ((isset($otherData[$count]['y']))) ?  ($otherData[$count]['y']) : ("No Data found") ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                <?php
                    $count++;
                }
                ?>
            </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/index.min.js"></script>
</body>

</html>