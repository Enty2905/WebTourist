const searchForm = document.getElementById("searchForm");

const items = document.querySelectorAll(".search__chose-item");

items.forEach(function (item) {
    item.addEventListener("click", function () {
        const action = item.dataset.action;

        items.forEach(function (el) {
            el.classList.remove("search__chose-item--active");
        });

        item.classList.add("search__chose-item--active");

        if (action === "default") {
            document.getElementById("sortInput").value = "";
            document.getElementById("onSaleInput").value = "";
        } else if (action === "price_high") {
            document.getElementById("sortInput").value = "price_high";
            document.getElementById("onSaleInput").value = "";
        } else if (action === "price_low") {
            document.getElementById("sortInput").value = "price_low";
            document.getElementById("onSaleInput").value = "";
        } else if (action === "on_sale") {
            document.getElementById("sortInput").value = "";
            document.getElementById("onSaleInput").value = "true";
        }

        searchForm.submit();
    });
});
