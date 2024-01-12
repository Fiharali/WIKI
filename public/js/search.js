const inputSearch = document.getElementById("input-search");
const selectSearch = document.getElementById("select-search");
const cards = document.getElementById("cards");


inputSearch.addEventListener('keyup', async function() {
   

    const response = await fetch('search?select=' + selectSearch.value + '&input=' + inputSearch.value);

    if (response.ok) {
        const data = await response.json();
     //    console.log(data);

        if (data.length > 0) {
            // If there is data, iterate through it and display results
            cards.innerHTML = '';    
            data.forEach(wiki => {
                const wikiHTML = `
         <div class="bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
             <a href="details-wiki?id=${wiki.id}">
                 <img class="rounded-t-lg" src="/wiki2/public/img/${wiki.photo}" alt="image" />
             </a>
             <div class="p-5">
                 <a href="details-wiki?id=${wiki.id}">
                     <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">${wiki.title}</h5>
                 </a>
                 <a href="details-wiki?id=${wiki.id}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                     Read more
                     <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                         <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                     </svg>
                 </a>
             </div>
         </div>
     `;
                cards.innerHTML += wikiHTML;
            });
        } else {
            cards.innerHTML = '<p>No results found.</p>';
        }
    } else {
        console.error('Error fetching data:', response.statusText);
    }

});