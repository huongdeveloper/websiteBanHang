//  Thêm danh mục
const adressAll = document.querySelector('#underlay')
const adresscloseAll = document.querySelector('#under-close')
    console.log(adressAll)
    // console.log(adressclose)
    adressAll.addEventListener("click", function() {
    document.querySelector('.underlay').style.display = "flex"
})
adresscloseAll.addEventListener("click", function() {
        document.querySelector('.underlay').style.display = "none"
    })

// //  Sửa danh mục
// const updateAll = document.querySelector('#underlay-update')
// const updatecloseAll = document.querySelector('#underlay-update-close')
//     console.log(updateAll)
//     // console.log(adressclose)
//     updateAll.addEventListener("click", function() {
//     document.querySelector('.underlay-update').style.display = "flex"
// })
// updatecloseAll.addEventListener("click", function() {
//         document.querySelector('.underlay-update').style.display = "none"
//     })
    

        
//  ===========  Thêm loại sản phẩm ======= 
const adressbtn = document.querySelector('#underlay-js')
const adressclose = document.querySelector('#underlay-close')
adressbtn.addEventListener("click", function() {
    document.querySelector('.underlay-js').style.display = "flex"
})
adressclose.addEventListener("click", function() {
        document.querySelector('.underlay-js').style.display = "none"
    })

//  ===========  Thêm màu ======= 
const adressbtncolor = document.querySelector('#color-js')
const colorclose = document.querySelector('#color-close')
 console.log(adressbtncolor)
    console.log(colorclose)
adressbtncolor.addEventListener("click", function() {
    document.querySelector('.color-js').style.display = "flex"
})
colorclose.addEventListener("click", function() {
        document.querySelector('.color-js').style.display = "none"
    })