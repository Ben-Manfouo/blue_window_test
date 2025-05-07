<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    @vite('resources/css/app.css')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body class="py-4 px-10">

<div class="bg-noir rounded-t-md py-1 px-4 lg:px-6 text-white text-lg lg:text-xl flex flex-col lg:flex-row lg:justify-between lg:items-center font-medium">

    <div class="w-full">
        Meilleur Casino en ligne Français : Comparatif du top casino - juin 2024
    </div>

    <div class="w-full flex flex-col sm:flex-row sm:items-center sm:justify-between py-2 sm:py-0">
        <select name="country" id="country" class="form-select w-full sm:w-auto">
            <option value="">Sélectionner un pays</option>
            @foreach ($countries as $country)
                <option value="{{ $country['country_iso_2_code'] }}">
                    {{ $country['country_name'] }}
                </option>
            @endforeach
        </select>

        <div class="pagination flex gap-2 justify-center sm:justify-end w-full sm:w-auto"></div>
    </div>
</div>

<div class="w-full bg-bleu-clair text-white text-left font-medium border-b border-gray-400 hidden md:flex">
    <div class="w-[5%] border-x border-gray-400 py-2 flex justify-center items-center text-[12px] lg:text-lg">#</div>
    <div class="w-[95%] flex border-r border-gray-400 text-[12px] lg:text-lg">
        <div class="w-[25.23%] border-r border-gray-400 py-2 flex justify-center items-center">Casino</div>
        <div class="w-[7.48%] border-r border-gray-400 py-2 flex justify-center items-center"></div>
        <div class="w-[25.23%] border-r border-gray-400 py-2 flex justify-center items-center">Bonus</div>
        <div class="w-[9.35%] border-r border-gray-400 py-2 flex justify-center items-center">Note</div>
        <div class="w-[7.48%] border-r border-gray-400 py-2 flex justify-center items-center">Termes</div>
        <div class="w-[25.23%] py-2 flex justify-center items-center">Obtenir le bonus</div>
    </div>
</div>

<div id="data-container"></div>

<div class="pagination flex gap-2 mt-0"></div>

<script>
    const container = document.getElementById('data-container');
    const paginations = document.getElementsByClassName('pagination');

    document.getElementById('country').addEventListener('change', function () {
        const selectedCountry = this.value;
        localStorage.setItem('countryCode', selectedCountry);
        loadData();
    });

    function renderSkeleton(count = 5) {
        container.innerHTML = '';
        for (let i = 0; i < count; i++) {
            container.innerHTML += `
                    <div class="hidden md:flex w-full ${ i % 2 === 0 ? "bg-white" : "bg-gray-100"} text-left font-medium border-b border-gray-400">
            <div class="w-[5%] relative border-x border-gray-400 py-2 flex justify-center items-center text-xl">
                <div class="bg-gray-300 rounded-br-lg text-xs text-white absolute top-0 left-0 z-10 w-22 pl-1">
                    <!-- Label (optional) -->
                </div>
                <div class="h-10 w-4 bg-gray-200 rounded animate-pulse"></div>
            </div>
            <div class="w-[95%] border-r border-gray-400">
                <div class="flex w-full text-black">
                    <!-- Logo + Name -->
                    <div class="w-[25.23%] border-r border-gray-400 py-2 flex justify-center items-center">
                        <div class="inline-flex items-center gap-2 py-1">
                            <div class="h-24 w-24 rounded-full bg-gray-300 animate-pulse"></div>
                            <div class="bg-gray-300 h-4 w-24 rounded animate-pulse"></div>
                        </div>
                    </div>
                    <!-- Icon section -->
                    <div class="w-[7.48%] border-r border-gray-400 py-2 flex justify-center items-center">
                        <div class="h-10 w-10 bg-gray-300 rounded animate-pulse"></div>
                    </div>
                    <!-- Bonus offer -->
                    <div class="w-[25.23%] relative border-r border-gray-400 py-2 flex justify-center items-center">
                        <div class="bg-gray-300 rounded-br-lg text-sm text-white absolute top-0 left-0 z-10 w-32 pl-1">
                            <!-- Promo Label -->
                        </div>
                        <div class="text-center space-y-1">
                            <div class="h-5 w-32 bg-gray-300 rounded animate-pulse"></div>
                            <div class="h-4 w-24 bg-gray-200 rounded animate-pulse"></div>
                        </div>
                    </div>
                    <!-- Rating -->
                    <div class="w-[9.35%] border-r border-gray-400 py-2 flex justify-center items-center">
                        <div class="flex gap-1">
                            <div class="h-4 w-4 bg-gray-300 rounded-full animate-pulse"></div>
                            <div class="h-4 w-4 bg-gray-300 rounded-full animate-pulse"></div>
                            <div class="h-4 w-4 bg-gray-300 rounded-full animate-pulse"></div>
                            <div class="h-4 w-4 bg-gray-300 rounded-full animate-pulse"></div>
                            <div class="h-4 w-4 bg-gray-200 rounded-full animate-pulse"></div>
                        </div>
                    </div>
                    <!-- Age limit icon -->
                    <div class="w-[7.48%] border-r border-gray-400 py-2 flex justify-center items-center">
                        <div class="h-8 w-8 bg-gray-300 rounded animate-pulse"></div>
                    </div>
                    <!-- CTA Buttons -->
                    <div class="w-[25.23%] py-2 flex justify-center items-center">
                        <div class="text-center space-y-2">
                            <div class="h-10 w-32 bg-gray-300 rounded animate-pulse"></div>
                            <div class="h-4 w-24 bg-gray-200 rounded animate-pulse"></div>
                        </div>
                    </div>
                </div>
                <!-- Description -->
                <div class="w-full border-t border-gray-400 py-1 px-2 text-xs">
                    <div class="h-3 bg-gray-200 rounded w-full animate-pulse mb-1"></div>
                    <div class="h-3 bg-gray-200 rounded w-5/6 animate-pulse"></div>
                </div>
            </div>
        </div>
                `;
        }
    }

    function renderData(data, currentPage, perPage) {
        container.innerHTML = '';
        data.forEach((brand, i) => {
            const starsHtml = `
            <div class="inline-flex gap-0 text-md md:text-[12px] lg:text-lg text-gray-200">
                ${[...Array(5)].map((_, i) => `
                    <i class="fa-solid fa-star ${brand.rating >= i + 1 ? 'text-or' : ''}"></i>
                `).join('')}
            </div>
        `;

            container.innerHTML += `
            <!-- Mobile View -->
            <div class="md:hidden border-x border-y border-gray-200 space-y-4 my-8 relative">
            <div class="bg-gray-100 text-xs font-bold items-center justfiy-center text-black absolute top-0 left-0 z-10 px-3 py-2">${(currentPage * perPage) + (i + 1) }</div>
              <!-- 2 Columns Layout -->
              <div class="grid grid-cols-2 gap-4 p-4">

                <!-- Column 1 -->
                <div class="flex flex-col items-center space-y-3 pr-2 border-r border-gray-200">
                  <!-- Brand Image -->
                  <img src="${brand.brand_image}" class="h-22 w-auto rounded-full border border-gray-300 cursor-pointer">

                  <!-- Stars -->
                  <div class="inline-flex gap-0 text-md text-gray-200">
                    ${[...Array(5)].map((_, i) => `
                      <i class="fa-solid fa-star ${brand.rating >= i + 1 ? 'text-or' : ''}"></i>
                    `).join('')}
                  </div>

                  <!-- Settings + Brand Name Row -->
                  <div class="flex items-center gap-1">
                    <img src="/assets/icons/setting-check.png" class="h-6 w-auto">
                    <div class="text-blue font-bold text-sm cursor-pointer">${brand.brand_name}</div>
                  </div>
                </div>

                <!-- Column 2 -->
                <div class="flex flex-col items-center justify-between space-y-3">
                  <!-- 18+ Icon -->
                  <img src="/assets/icons/upper-18.png" class="h-6 w-auto">

                  <!-- Bonus Description -->
                  <div class="text-center">
                    <div class="font-bold text-base">${brand.bonus_description}</div>
                    <div class="font-medium text-sm">${brand.bonus_details}</div>
                  </div>

                  <!-- CTA -->
                  <div class="text-center space-y-2 w-full">
                    <button class="rounded-md bg-green shadow text-white text-sm px-4 py-2 w-full cursor-pointer">
                      Obtenir le bonus
                    </button>
                    <div class="cursor-pointer text-blue font-bold text-sm">
                      Visiter le site
                    </div>
                  </div>
                </div>

              </div>

               <!-- Description -->
              <div class="text-xs text-gray-500 border-t border-gray-200 py-2 px-4 bg-gray-100">
                ${brand.brand_description}
              </div>

            </div>

            <div class="hidden md:flex w-full ${i % 2 === 0 ? 'bg-white' : 'bg-gray-100'} text-left font-medium border-b border-gray-400">
                <div class="flex flex-col md:flex-row border-x border-gray-400">

                    <div class="w-full md:w-[5%] relative py-2 flex justify-center items-center text-xl border-b md:border-r md:border-b-0 border-gray-400">
                        ${
                            brand.is_best_rated
                                ? `<div class="bg-violet rounded-br-lg text-xs text-white absolute top-0 left-0 z-10 w-22 pl-1">
                                                                MIEUX NOTÉ
                                                            </div>`
                                : brand.is_popular
                                    ? `<div class="bg-orange rounded-br-lg text-xs text-white absolute top-0 left-0 z-10 w-19 pl-1">
                                                                POPULAIRE
                                                            </div>`
                                    : ''
                        }
                        ${(currentPage * perPage) + (i + 1) }
                    </div>

                    <div class="w-full md:w-[95%] border-gray-400">
                        <div class="flex flex-col md:flex-row text-black">
                            <!-- Brand Image & Name -->
                            <div class="w-full md:w-[25.23%] border-t md:border-t-0 md:border-r border-gray-400 py-4 flex items-center justify-center">
                                <div class="flex flex-col lg:flex-row items-center gap-2 w-full px-4">
                                    <div class="w-full flex justify-center lg:justify-end items-center">
                                        <img src="${brand.brand_image}" class="cursor-pointer h-20 lg:h-24 w-auto rounded-full border border-gray-300 mx-auto md:mx-0">
                                    </div>

                                    <div class="cursor-pointer w-full text-blue font-bold text-center lg:text-left mt-2 md:mt-0 text-xs lg:text-[14.5px]">${brand.brand_name}</div>
                                </div>
                            </div>

                            <!-- Settings Icon -->
                            <div class="w-full md:w-[7.48%] border-t md:border-t-0 md:border-r border-gray-400 py-4 flex justify-center items-center">
                                <img src="/assets/icons/setting-check.png" class="h-8 md:h-10 w-auto">
                            </div>

                            <!-- Bonus -->
                            <div class="w-full md:w-[25.23%] relative border-t md:border-t-0 md:border-r border-gray-400 py-4 flex justify-center items-center">
                                ${
                brand.is_bonus_exclusive
                    ? `<div class="bg-red rounded-br-lg text-sm text-white absolute top-0 left-0 z-10 w-37 pl-1">
                                            EXCLUSIF
                                        </div>`
                    : ''
            }
                                <div class="text-center px-2">
                                    <div class="font-bold text-base md:text-[15px] lg:text-lg">${brand.bonus_description}</div>
                                    <div class="font-medium text-sm md:text-[13px] lg:text-sm">${brand.bonus_details}</div>
                                </div>
                            </div>

                            <!-- Stars -->
                            <div class="w-full md:w-[9.35%] border-t md:border-t-0 md:border-r border-gray-400 py-4 flex justify-center items-center">
                                ${starsHtml}
                            </div>

                            <!-- 18+ Icon -->
                            <div class="w-full md:w-[7.48%] border-t md:border-t-0 md:border-r border-gray-400 py-4 flex justify-center items-center">
                                <img src="/assets/icons/upper-18.png" class="h-6 md:h-8 w-auto">
                            </div>

                            <!-- Call to Action -->
                            <div class="w-full md:w-[25.23%] py-4 flex justify-center items-center">
                                <div class="text-center space-y-2 px-2">
                                    <button class="rounded-md bg-green shadow text-white text-sm md:text-[14px] lg:text-base px-4 lg:px-10 py-2 lg:py-3 w-full cursor-pointer">
                                        Obtenir le bonus
                                    </button>
                                    <div class="cursor-pointer text-blue font-bold text-sm md:text-xs lg:text-md">
                                        Visiter le site
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Description -->
                        <div class="w-full border-t border-gray-400 py-2 px-4 text-xs text-gray-500">
                            ${brand.brand_description}
                        </div>
                    </div>
                </div>
            </div>
        `;
        });
    }

    function renderPagination(total, currentPage, perPage) {
        for (const pagination of paginations) {
            pagination.innerHTML = '';
            const pages = Math.ceil(total / perPage);
            pagination.innerHTML += `
            <div class="flex justify-end items-center my-4 mr-3 w-full">
        <div class="flex items-center gap-2 text-sm text-gray-600">
            <div class="pr-4">${total} éléments</div>
            ${
                currentPage === 1 ? '|' : `<button onclick="loadData(${currentPage-1})" class="cursor-pointer text-blue"><i class="fa-solid fa-chevron-left"></i>Préc</button>`
            }
            <div class="px-2 text-xs">${currentPage} sur ${pages}</div>
            ${
                currentPage === pages ? '' : `<button onclick="loadData(${currentPage+1})" class="cursor-pointer text-blue">Suiv <i class="fa-solid fa-chevron-right"></i></button>`
            }
        </div>
    </div>
            `;
        }
    }

    async function loadData(page = 1) {
        renderSkeleton();
        const res = await fetch(`http://localhost:8000/api/brands?page=${page}`, {
            method: 'GET',
            headers: {
                'CF-IPCountry': localStorage.getItem('countryCode') ?? '',
                'Accept': 'application/json'
            }
        });
        const result = await res.json();
        renderData(result.data.data, result.data.current_page - 1, result.data.per_page);
        renderPagination(result.data.total, result.data.current_page, result.data.per_page);
    }

    // Load on page start
    window.onload = () => loadData();
</script>

</body>
</html>
