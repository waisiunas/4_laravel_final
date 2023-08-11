document.getElementById("category_id").addEventListener("change", function () {
    const selectedValue = this.value;
    if (selectedValue === "-1") {
        const modal = new bootstrap.Modal(
            document.getElementById("categoryModal")
        );
        modal.show();
    }
});

document.getElementById("brand_id").addEventListener("change", function () {
    const selectedValue = this.value;
    if (selectedValue === "-1") {
        const modal = new bootstrap.Modal(
            document.getElementById("brandModal")
        );
        modal.show();
    }
});
