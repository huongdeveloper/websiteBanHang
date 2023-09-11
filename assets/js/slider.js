    const imgItem = document.querySelectorAll(".aspect-ratio-169 img")
    const imgItemContainer = document.querySelector(".aspect-ratio-169")
    const dotItem = document.querySelectorAll(".dot")
    let index = 0;
    let imgLeng = imgItem.length
    imgItem.forEach(function(image, index) {
        image.style.left = index * 120 + "%"
        dotItem[index].addEventListener("click", function() {
            slideRun(index)
        })
    })

    function slider() {
        index++;
        if (index >= imgLeng) {
            index = 0;
        }
        slideRun(index)
    }

    function slideRun(index) {
        imgItemContainer.style.left = "-" + index * 120 + "%"
        let dotActive = document.querySelector(".active")
        dotActive.classList.remove("active")
        dotItem[index].classList.add("active");
    }

    setInterval(slider, 5000)
const docpro = document.querySelector(".tab-women")
const docsele = document.querySelector(".tab-men")
const docSelector = document.querySelector(".tab-kid")
if (docpro) {
    docpro.addEventListener("click", function() {
        document.querySelector(".home-product").style.display = "block"
        document.querySelector(".home-product-pro").style.display = "none"
        document.querySelector(".home-product-produ").style.display = "none"
    })
}
if (docsele) {
    docsele.addEventListener("click", function() {
        document.querySelector(".home-product").style.display = "none"
        document.querySelector(".home-product-pro").style.display = "block"
        document.querySelector(".home-product-produ").style.display = "none"
    })
}
if (docSelector) {
    docSelector.addEventListener("click", function() {
        document.querySelector(".home-product").style.display = "none"
        document.querySelector(".home-product-pro").style.display = "none"
        document.querySelector(".home-product-produ").style.display = "block"
    })
}

    