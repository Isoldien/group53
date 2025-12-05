document.addEventListener("DOMContentLoaded", () => {


    // -------------------------------------- VARIABLES ------------------------------------------ //


    // Header/Footer
    const maintag = document.querySelector("main")
    const footertag = document.querySelector("footer")
    let screen_size = window.matchMedia('(max-width: 900px)')
    const navbar = document.querySelector("header")
    const navlinks = document.querySelector("header nav")
    const menutab = document.querySelector("#menu")
    const menu_icon = document.createElement("img")
    const menuImg = document.getElementById("menuconfig").dataset.star;
    let menu_toggle = false


    // Product listing
    const productlist = document.querySelector("#productlist")
    const subtotalprice = document.querySelector("main #subtotalprice")
    const total = document.querySelector("main #total")
    const delivery = document.querySelector("main #delivery")


    const placeholderImg = document.getElementById("placeholderconfig").dataset.star;
    let cart_summary = {} // temp value


    let product_components = [{
        article: {
            name: "empty", // add product id here
            className: "flex w-full items-center gap-5",
            img: {
                className: "h-15 w-auto",
                src: placeholderImg,
            },
            div: {
                productName: "empty",
                price: "empty"
            }
        },
        hr: {
            className: "border-green-secondary border-[1.5px] w-full h-0.5",
            name: "empty"
        }
    }]


    // -------------------------------------- FUNCTIONS ------------------------------------------ //


    // Header


    menu_icon.setAttribute("src", menuImg)
    menu_icon.setAttribute("class","h-11 w-auto")
    menu_icon.setAttribute("alt", "Menu")
    menu_icon.onclick = clicked_menu


    function smallscreen(size) {


        const logo_justify = footertag.querySelector("#logofooter")
        const links_justify = footertag.querySelector("#linksfooter")
        const news_justify = footertag.querySelector("#newsfooter")


        if (size.matches == true) {
            navbar.replaceChild(menu_icon,navlinks)
            footertag.classList.remove("h-12")
            footertag.classList.add("flex-col","h-grow")
            logo_justify.classList.replace("justify-start","justify-center")
            news_justify.classList.replace("justify-end","justify-center")


            logo_justify.classList.replace("w-[calc(100%/3)]", "w-full")
            news_justify.classList.replace("w-[calc(100%/3)]", "w-full")
            links_justify.classList.replace("w-[calc(100%/3)]", "w-full")


        } else {
            if (navbar.contains(navlinks) == false) {
                navbar.replaceChild(navlinks, menu_icon)
                footertag.classList.add("h-12")
                footertag.classList.remove("flex-col","h-grow")
                logo_justify.classList.add("justify-start")
                news_justify.classList.add("justify-end")
           
                logo_justify.classList.replace("w-full", "w-[calc(100%/3)]")
                news_justify.classList.replace("w-full", "w-[calc(100%/3)]")
                links_justify.classList.replace("w-full", "w-[calc(100%/3)]")
            }
           
            if (menu_toggle == true && navbar.contains(navlinks)) {
                clicked_menu()
            }
        }


    }


    smallscreen(screen_size)


    screen_size.addEventListener("change",()=>{
        smallscreen(screen_size)
    })


    function clicked_menu() {
        menu_toggle = !menu_toggle


        if (menu_toggle) {
            navbar.classList.add("fixed","top-0")
            maintag.classList.add("mt-12")
            menutab.removeAttribute("hidden")
        } else {
            navbar.classList.remove("fixed","top-0")
            maintag.classList.remove("mt-12")
            menutab.setAttribute("hidden", true)
        }
    }


    // Product listing


    function isTag(name) { // chatgpt
    const el = document.createElement(name);
    return !(el instanceof HTMLUnknownElement);
    }


    function construct_product_components(dictionary, parent, product_id) {
        for (let items in dictionary) {
            let value = dictionary[items]


            if (isTag(items)) {
                const element = document.createElement(items)
                construct_product_components(value, element,product_id)
                parent.appendChild(element)
            } else if (parent.tagName.toLowerCase() == "div" && items == "productName") {


                parent.className = "flex flex-col gap-2 w-full"
                const div1 = document.createElement("div")
                div1.className = "flex w-full justify-between"
                const div2 = document.createElement("div")
                const div2_div = document.createElement("div")
                div2.className = "flex gap-3"
                parent.appendChild(div1)
                parent.appendChild(div2)


                for (let i = 1; i < 3 ;i++) {


                    const div1_h3 = document.createElement("h3")
                    div1_h3.className = "text-[20px] font-bold text-green-secondary"
                    div1_h3.textContent = dictionary["productName"]


                    if (i == 1) {
                        // button
                        const div1_button = document.createElement("button")
                        div1_button.textContent = "Remove"
                        div1_button.onclick = function() {
                            remove_item(product_id,true)
                        }
                        div1.appendChild(div1_h3)
                        div1.appendChild(div1_button)
                    } else {
                        // h3
                        div1_h3.textContent = "£ " +  dictionary["price"]
   
                        // div
                        div2_div.className = "flex gap-1"
                        div2.appendChild(div1_h3)
                        div2.appendChild(div2_div)


                        for (let j = 1; j < 4; j++) {


                            const div2_inputs = document.createElement("input")
                            div2_inputs.type = "button"
                            div2_inputs.className = "w-5 m-0"


                            if (j == 1) {
                                div2_inputs.name = "decrease"
                                div2_inputs.value = "-"
                                div2_inputs.onclick = function() {remove_item(product_id)}
                            } else if (j == 2) {
                                div2_inputs.type = "number"
                                div2_inputs.className = "w-10 font-bold text-center [&::-webkit-inner-spin-button]:appearance-none [&::-webkit-outer-spin-button]:appearance-none"
                                div2_inputs.name = "quantity"
                                div2_inputs.value = "1"
                                div2_inputs.min = 1
                            } else {
                                div2_inputs.name = "increase"
                                div2_inputs.value = "+"
                                div2_inputs.onclick = function() {append_item(product_id)}
                            }


                            div2_div.appendChild(div2_inputs)
                        }  
                    }
                }
       
            } else if (items == "textContent") {
                parent.textContent = value
            } else if (items == "className") {
                parent.className = value
            } else {
                parent.setAttribute(items, value)
            }
        }
    }


    function product_components_list(product_id, parent) {
       
        for (let list of product_components) {


            for (let tag in list) {


                if (tag == "article") {


                    cart_summary[product_id] = { // PHP insertion. Replace the values of productname and price from product id in db
                        "ProductName": "Product Name",
                        "Price": 5,
                        "Quantity": 1
                    }
                    updateCartSummary()


                    // note: dont touch
                    list[tag]["name"] = product_id
                    list[tag]["div"]["price"] = cart_summary[product_id]["Price"]
                    list[tag]["div"]["productName"] = cart_summary[product_id]["ProductName"]
                }


                if (tag == "hr") {
                    list[tag]["name"] = product_id
                }


                const element = document.createElement(tag)


                construct_product_components(list[tag], element, product_id)


                parent.appendChild(element)
            }
        }
    }


    function modify_quantity(product, increase=true, max=false) { // used to change quantity of product


        const modify_product = product.querySelector("input[name=quantity]")
        const product_id = product.getAttribute("name")


        if (max) {
            modify_product.max = max
        }


        if (increase) {
            const max_items = modify_product.getAttribute("max")


            if (max_items) {
                modify_product.max -= 1
            }
           
            modify_product.stepUp()
           
        } else {
            const max_items = modify_product.getAttribute("max")


            if (max_items) {
                modify_product.max += 1
            }
            modify_product.stepDown()
        }
       
        cart_summary[product_id]["Quantity"] = modify_product.value
        updateCartSummary()
    }


    function check_product(product_id) { // used to check if product in cart exists already
        const check_exists = productlist.querySelector("article[name=" + product_id + "]")
       
        if (check_exists) {
            return check_exists
        } else {
            return false
        }
    }


    // USE FOR DB
    function append_item(product_id, max=false) { // NOTE: only set the max value once when calling the append item method for a product id.


        let product_exists = check_product(product_id)


        if (product_exists) {
            modify_quantity(product_exists,true,max)
        } else {
            product_components_list(product_id, productlist)
        }


    }


    function remove_item(product_id, remove_completely = false) {
        let product_exists = check_product(product_id)


        if (product_exists && remove_completely == false) {
            modify_quantity(product_exists, false)
        } else if (remove_completely) {
            productlist.removeChild(product_exists)
            productlist.removeChild(productlist.querySelector("hr[name=" + product_id + "]"))
            delete cart_summary[product_id]
            updateCartSummary()
        }
    }


    function updateCartSummary() {


        let display_price = 0


        for (let items in cart_summary) {


            display_price += cart_summary[items]["Price"] * cart_summary[items]["Quantity"]
        }


        subtotalprice.textContent = display_price
       
        if (delivery.textContent == "xx.xx") {
            delivery.textContent = "2.50"
        }


        total.textContent = (parseFloat(subtotalprice.textContent) + parseFloat(delivery.textContent)).toFixed(2)
    }


    // DEMO Examples
    append_item("article_2")
    append_item("article_2")
    append_item("article_1")
    append_item("article_3")
    append_item("article_5")
    append_item("article_6")
    append_item("article_7")
   append_item("article_8")
    append_item("article_10")
})

