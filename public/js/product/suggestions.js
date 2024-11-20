let latestFetchValue = "";

function showSuggestions(value) {
    let suggestionBox = document.getElementById("suggestions");
    suggestionBox.innerHTML = "";

    if (value.length === 0) {
        return;
    }

    latestFetchValue = value;

    fetch(`${productSuggestUrl}?query=${value}`, {
        headers: {
            "X-Requested-With": "XMLHttpRequest",
            "X-CSRF-TOKEN": csrfToken,
        },
    })
        .then((response) => response.json())
        .then((data) => {
            if (value !== latestFetchValue) {
                return;
            }

            let suggestionMap = new Map();

            data.forEach((suggestion) => {
                let normalized = suggestion.toLowerCase();
                if (!suggestionMap.has(normalized)) {
                    suggestionMap.set(normalized, suggestion);
                }
            });

            let suggestions = Array.from(suggestionMap.values());

            let filteredSuggestions = suggestions.filter((suggestion) =>
                suggestion.toLowerCase().includes(value.toLowerCase()),
            );

            suggestionBox.innerHTML = "";

            filteredSuggestions.forEach((suggestion) => {
                let suggestionItem = document.createElement("div");
                suggestionItem.classList.add(
                    "px-4",
                    "py-2",
                    "hover:bg-gray-100",
                    "cursor-pointer",
                );
                suggestionItem.innerHTML = suggestion;
                suggestionItem.onclick = function () {
                    document.getElementById("simple-search").value = suggestion;
                    suggestionBox.innerHTML = "";
                };
                suggestionBox.appendChild(suggestionItem);
            });
        })
        .catch((error) => {
            console.error("Error fetching suggestions:", error);
        });
}
