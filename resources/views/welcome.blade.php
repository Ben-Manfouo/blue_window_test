<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    @vite('resources/css/app.css')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body class="py-4 px-10">

<h1 class="bg-noir rounded-t-md py-3 px-6 text-white text-xl font-medium">
    Meilleur Casino en ligne Français : Comparatif du top casino - juin 2024
</h1>

<div class="flex w-full bg-bleu-clair text-white text-left font-medium border-b border-gray-400">
    <div class="w-[5%] border-x border-gray-400 py-2 flex justify-center items-center">#</div>
    <div class="w-[95%] flex border-r border-gray-400">
        <div class="w-[25.23%] border-r border-gray-400 py-2 flex justify-center items-center">Casino</div>
        <div class="w-[7.48%] border-r border-gray-400 py-2 flex justify-center items-center"></div>
        <div class="w-[25.23%] border-r border-gray-400 py-2 flex justify-center items-center">Bonus</div>
        <div class="w-[9.35%] border-r border-gray-400 py-2 flex justify-center items-center">Note</div>
        <div class="w-[7.48%] border-r border-gray-400 py-2 flex justify-center items-center">Termes</div>
        <div class="w-[25.23%] py-2 flex justify-center items-center">Obtenir le bonus</div>
    </div>
</div>

<div id="data-container"></div>

<div id="pagination" class="flex gap-2 mt-4"></div>

<script>
    const container = document.getElementById('data-container');
    const pagination = document.getElementById('pagination');

    function renderSkeleton(count = 5) {
        container.innerHTML = '';
        for (let i = 0; i < count; i++) {
            container.innerHTML += `
                    <div class="flex w-full ${ i % 2 === 0 ? "bg-white" : "bg-gray-100"} text-left font-medium border-b border-gray-400">
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

    function renderData(data) {
        container.innerHTML = '';
        data.forEach((brand, i) => {

            const starsHtml = `
    <div class="inline-flex gap-0 text-lg text-gray-200">
        ${[...Array(5)].map((_, i) => `
            <i class="fa-solid fa-star ${brand.rating >= i + 1 ? 'text-or' : ''}"></i>
        `).join('')}
    </div>
`;

            container.innerHTML += `
                    <div class="flex w-full ${ i % 2 === 0 ? "bg-white" : "bg-gray-100"} text-left font-medium border-b border-gray-400">
        <div class="w-[5%] relative border-x border-gray-400 py-2 flex justify-center items-center text-xl">
            ${
                brand.is_best_rated
                    ? `<div class="bg-violet rounded-br-lg text-xs text-white absolute top-0 left-0 z-10 w-22 pl-1">
                            MIEUX NOTÉ
                        </div>`
                    : brand.is_popular ? `<div class="bg-orange rounded-br-lg text-xs text-white absolute top-0 left-0 z-10 w-19 pl-1">
                            POPULAIRE
                        </div>`
                        : ''
            }
            ${ i + 1}
                </div>
                <div class="w-[95%] border-r border-gray-400">
                    <div class="flex w-full text-black">
                        <div class="w-[25.23%] border-r border-gray-400 py-2 flex justify-center items-center">
                            <div class="inline-flex items-center justify-center gap-2 py-1 px-auto w-full">
                                <div class="w-[50%] flex justify-end items-center">
                                    <img src="${ brand.brand_image}" class="h-24 w-auto rounded-full border border-gray-300 p-2">
                                </div>
                                <div class="text-blue font-bold w-[50%] flex justify-start items-center">
                                    ${ brand.brand_name}
                                </div>
                            </div>

                        </div>
                        <div class="w-[7.48%] border-r border-gray-400 py-2 flex justify-center items-center">
                            <img src="/assets/icons/setting-check.png" class="h-10 w-auto">
                        </div>
                        <div class="w-[25.23%] relative border-r border-gray-400 py-2 flex justify-center items-center">

                        ${
                            brand.is_bonus_exclusive
                                ? `<div class="bg-red rounded-br-lg text-sm text-white absolute top-0 left-0 z-10 w-37 pl-1">
                                EXCLUSIF
                            </div>`
                                : ''
                        }
                            <div class="text-center">
                                <div class="font-bold text-lg text-black">
                                    ${ brand.bonus_description}
                                </div>
                                <div class="font-medium text-sm">
                                    ${ brand.bonus_details}
                                </div>
                            </div>
                        </div>
                        <div class="w-[9.35%] border-r border-gray-400 py-2 flex justify-center items-center">
                            ${starsHtml}
                        </div>
                        <div class="w-[7.48%] border-r border-gray-400 py-2 flex justify-center items-center">
                            <img src="/assets/icons/upper-18.png" class="h-8 w-auto">
                        </div>
                        <div class="w-[25.23%] py-2 flex justify-center items-center">
                            <div class="text-center space-y-1">
                                <button class="rounded-md bg-green shadow text-white px-10 py-3">
                                    Obtenir le bonus
                                </button>
                                <div class="cursor-pointer text-blue font-bold text-md">
                                    Visiter le site
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="w-full border-t border-gray-400 py-1 px-2 text-xs text-gray-400">
                        ${ brand.brand_description}
                    </div>
                </div>
            </div>
`;
        });
    }

    function renderPagination(total, currentPage, perPage) {
        pagination.innerHTML = '';
        const pages = Math.ceil(total / perPage);
        for (let i = 1; i <= pages; i++) {
            pagination.innerHTML += `<button class="px-3 py-1 rounded border ${i === currentPage ? 'bg-blue-600 text-white' : 'bg-white'}" onclick="loadData(${i})">${i}</button>`;
        }
    }

    async function loadData(page = 1) {
        renderSkeleton();
        const res = await fetch(`http://localhost:8000/api/brands?page=${page}`);
        const result = await res.json();
        console.log(result);
        renderData(result.data.data);
        renderPagination(result.data.total, result.data.page, result.data.per_page);
    }

    // Load on page start
    window.onload = () => loadData();
</script>

</body>
</html>
