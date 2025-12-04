
document.addEventListener("DOMContentLoaded", () => {

    // -------------------------------------- VARIABLES ------------------------------------------ //

    const selectedstarImg = document.getElementById("selectedstarconfig").dataset.star;
    const unselectedstarImg = document.getElementById("unselectedstarconfig").dataset.star;
    const placeholderImg = document.getElementById("placeholderconfig").dataset.star;
    const closeImg = document.getElementById("closeconfig").dataset.star;
    const menuImg = document.getElementById("menuconfig").dataset.star;

    const maintag = document.querySelector("main")
    const footertag = document.querySelector("footer")

    // CART VALUE IN HEADER
    let add = 0 // Temp variable. PHP insertion, count the number of items in user's cart from db
    let screen_size = window.matchMedia('(max-width: 900px)')
    const navbar = document.querySelector("header")
    const navlinks = document.querySelector("header nav")
    const menutab = document.querySelector("#menu")
    const menu_icon = document.createElement("img")
    let menu_toggle = false

    // FORM 1: Add To Cart
    const append_cart_form = document.querySelector("#append_cart");
    const increase = document.querySelector("input[name='increase']")
    const decrease = document.querySelector("input[name='decrease']") 
    const quantity = document.querySelector("input[name='quantity']")

    /* FORM 2 PART 1: Add Product Review
    * Use the create_review() when generating reviews from db. Check what values are required.
    */
    let reviewform = document.querySelector("form[id='product_review']");
    let reviewlabel = document.querySelector("label[name='reviewdescription']")
    let reviewtextarea = document.querySelector("textarea[name='reviewtextarea']")
    const reviewtitle = document.querySelector("input[name='title']")
    const reviewtitleplaceholder = reviewtitle.placeholder
    const reviewtextareaplaceholder = reviewtextarea.placeholder
    const labels = document.querySelectorAll("#stars label");
    const noreviewsmsg = document.querySelector("#noreviews")

    // CUSTOMER REVIEWS: Mini Window

    let window_components = [
    {"div": {
        class:"flex flex-row justify-between w-full",
        form: {
            class: "flex",
            label: null
        },
        img: {
            class: "w-6 h-auto",
            src: closeImg,
            id: "closebutton"
        }
    }},        
    { "section": {
        class: "flex flex-col w-full",
        h3: {
            class: "font-bold text-2xl",
            textContent: "Review Title"
        },
        p : {
            textContent: "Review text"
        }
    }},
    {"section" : {
        class: "flex gap-2 items-center rounded-2xl border-beige-primary border-2 w-full p-2",
        img : {
            src: placeholderImg,
            alt: "profile photo",
            class: "w-[50px] h-[50px] rounded-full object-cover"
        },
        div: {
            class: "flex flex-col",
            h5: {
                textContent : "Reviewer username"
            },
            p: {
                class: "text-stone-400",
                textContent: "Date"
            }
        }
    }}]

    const reviewarticles = document.querySelector("#reviewarticles")
    const mini_window = document.createElement("div")
    mini_window.className = "miniwindow flex flex-col items-center justify-center bg-green-primary p-5"
    const mini_article = document.createElement("article")
    mini_article.className = "w-[50%] bg-white rounded-lg shadow-md hover:shadow-kg border border-gray-200 transition-shadow p-5 text-black gap-4 flex flex-col"

    // FORM 3: FILTERS

    const filter = document.getElementById("filters")

    // -------------------------------------- FUNCTIONS ------------------------------------------ //

    // Header

    menu_icon.setAttribute("src", menuImg)
    menu_icon.setAttribute("class","h-11 w-auto")
    menu_icon.setAttribute("alt", "Menu")
    menu_icon.onclick = clicked_menu

    function smallscreen(size) {

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

    // FORM 1

    function add_to_cart(quantity) {
        
        add += Number(quantity)

        const cart1 = document.querySelector("a[name='cart1']");
        const cart2 = document.querySelector("a[name='cart2']");

        [cart1,cart2].forEach((c)=> { // chatgpt used
            if (!c) return; 
            c.style.setProperty('--after-content','"(' + add + ')"')
        })
        // PHP Insertion, send product_id and quantity of the item to db (to user's cart list).

    }

    increase.addEventListener("click",()=> {
        quantity.stepUp()
    })

    decrease.addEventListener("click",()=> {
        quantity.stepDown()
    })
    
    append_cart_form.addEventListener("submit", (e)=>{
        e.preventDefault()
        add_to_cart(quantity.value)

    })

    // FORM 2

    function generate_reviews(username, title, rating, comment, date) {
        const new_review = document.createElement("article")
        new_review.className = "flex gap-3 items-center w-full"
        
        let new_review_components = [
            {form : rating},
            {p : null}
        ]

        for (let keys of new_review_components) {
            for (let tag in keys) {

                if (tag == "form") {
                    const form = document.createElement("form")
                    const star_rating = keys[tag]
                    form.className = "flex items-center flex-row"

                    for (let i = 1; i < 6; i++) {

                        const star_label = document.createElement("label")
                        let star_img = unselectedstarImg

                        if (star_rating >= i) {
                            star_img = selectedstarImg
                        }

                        const input = document.createElement("input")
                        input.className = "star"
                        input.type = "radio"
                        input.readOnly = true
                        input.className = "hidden"
                        star_label.appendChild(input)
                        const img = document.createElement("img")
                        img.className = "w-8 h-auto bg-transparent hover:opacity-80"
                        img.setAttribute("src", star_img)
                        star_label.appendChild(img)
                        
                        form.appendChild(star_label);
                    }

                    new_review.appendChild(form)

                } else if (tag == "p") {

                    for (let i = 1; i < 4; i++) {
                        const p_tag = document.createElement("p")

                        if (i == 1) {
                            p_tag.className = "font-bold text-[18px]"
                            p_tag.textContent = username
                        } else if (i == 2) {
                            p_tag.className = "font-medium"
                            p_tag.textContent = comment
                        } else {
                            p_tag.className = "flex w-full justify-end font-medium"
                            p_tag.textContent = date
                        }
                        new_review.appendChild(p_tag)
                    }

                }
            }
        }

        reviewarticles.appendChild(new_review)

        new_review.addEventListener("click", ()=> {
            miniwindow_properties(username, title, rating, comment, date)
            open_article()
        })
    }

    function create_reviews(username, title, stars, comment, date) { // PHP Insertion. USE THIS FOR CREATING REVIEWS FROM DB

        generate_reviews(username, title, stars ,comment, date)

        if (reviewarticles.contains(noreviewsmsg)) {
            reviewarticles.removeChild(noreviewsmsg)
        }
        
        // location.reload()

        reviewtitle.value = "";
        reviewtextarea.value = "";
        clearstars();
    }

    labels.forEach(label => { // chatgpt
        label.addEventListener("mouseenter", (e) => {
            e.currentTarget.classList.add("checked-before-hover");

            for (let l of labels) {
                if (!l.classList.contains("checked-before-hover")) {
                    l.classList.add("checked-before-hover");
                } else {
                    break;
                }
            }
        });

        label.addEventListener("mouseleave", (e) => {
            e.currentTarget.classList.remove("checked-before-hover");

            for (let l of labels) {
                const input = l.querySelector("input");
                if (!input.checked) {
                    l.classList.remove("checked-before-hover");
                }
            }
        });

        label.addEventListener("click", (e) => {

            clearstars()

            for (let l of labels) {
                const input = l.querySelector("input");
                input.checked = true;
                l.classList.add("checked-before-hover");

                if (l === e.currentTarget) {
                    break;
                }
            }
        });
    });

    function clearstars() {
        for (let l of labels) {
            const input = l.querySelector("input");
            input.checked = false;
            l.classList.remove("checked-before-hover");
        }
    }

    reviewtitle.addEventListener("focus",()=> {

        if (reviewtitle.value == "") {
            reviewtitle.placeholder = ""
        }

        reviewlabel.setAttribute("hidden", "true")
        reviewform.removeAttribute("hidden");
        reviewtextarea.removeAttribute("hidden");
        
    })

    reviewtitle.addEventListener("blur",()=> {
        if (reviewtitle.value == "") {
            reviewtitle.placeholder = reviewtitleplaceholder
            reviewlabel.removeAttribute("hidden")
            reviewform.setAttribute("hidden", "true")
            reviewtextarea.setAttribute("hidden", "true")
            reviewtextarea.value = ""
            clearstars()
        }
    })

    reviewtextarea.addEventListener("focus",()=>{
        if (reviewtextarea.value == "") {
            reviewtextarea.placeholder = ""
        }
    })

    reviewtextarea.addEventListener("blur",()=>{
        if (reviewtextarea.value=="") {
            reviewtextarea.placeholder = reviewtextareaplaceholder
        }
    })

    reviewform.addEventListener("submit", (e)=> {
        e.preventDefault(); 
        var total_stars = 0

        for (let l of labels) {
            const input = l.querySelector("input");
            
            if (input.checked) {
                total_stars += 1
            }
        }

        const username = "Username";
        const title = reviewtitle.value;
        const comment = reviewtextarea.value;
        const date = new Date()
        const date_format = date.getDay() + "/" + date.getMonth() + "/" + date.getFullYear()

        if (reviewarticles.contains(noreviewsmsg)) {
            reviewarticles.removeChild(noreviewsmsg)
        }

        generate_reviews(username, title, total_stars ,comment, date_format)
        //location.reload()

        reviewtitle.value = "";
        reviewtitle.dispatchEvent(new Event("blur"));
    })

    // CUSTOMER REVIEWS Mini Window

    function validHTMLTag(tag) { // chatgpt
        const el = document.createElement(tag);
        return !(el instanceof HTMLUnknownElement);
    }

    function checkHasChild(element) { // chatgpt
        const isObject = (typeof element === "object");
        const isNotNull = (element !== null);
        const hasKeys = (Object.keys(element).length > 0);

        return isObject && isNotNull && hasKeys;
    }

    function generate_miniwindow(dictionary, parent) {

        for (let child in dictionary) {
            const value = dictionary[child]

            if (child == "textContent") {
                parent.textContent = value;

            } else if ( validHTMLTag(child) ) {

                if (child == "label") { // parent is form
                    const star_rating = value

                    for (let i = 1; i < 6; i++) {

                        const star_label = document.createElement("label")
                        let star_img = unselectedstarImg

                        if (star_rating >= i) {
                            star_img = selectedstarImg
                        }

                        const input = document.createElement("input")
                        input.className = "star"
                        input.type = "radio"
                        input.readOnly = true
                        input.className = "hidden"
                        star_label.appendChild(input)
                        const img = document.createElement("img")
                        img.className = "w-8 h-auto bg-transparent hover:opacity-80"
                        img.setAttribute("src", star_img)
                        star_label.appendChild(img)

                        parent.appendChild(star_label)
                    }

                } else {
                    const e = document.createElement(child)

                    if (checkHasChild(value)) {
                        generate_miniwindow(value, e)
                    }

                    parent.appendChild(e);
                }

            } else {
                parent.setAttribute(child, value)
            }

        }
    }

    function miniwindow() {

        mini_article.innerHTML = ""

        for (let keys of window_components) {
            for (let tag in keys) { // first order of tags
                const e = document.createElement(tag)

                if (checkHasChild(keys[tag])) {
                    generate_miniwindow(keys[tag], e)
                }
                mini_article.appendChild(e)
            }
        }

    }

    function miniwindow_properties(username, title, total_stars, comment, date_format) {

        for (let keys of window_components) {

            for (let tag in keys) { // first order of tags

                if (tag == "div") {
                    keys[tag]["form"]["label"] = total_stars;
                } else if ("h3" in keys[tag]) {
                    keys[tag]["h3"]["textContent"] = title;
                    keys[tag]["p"]["textContent"] = comment;
                } else if ("h5" in keys[tag]) {
                    keys[tag]["h5"]["textContent"] = username;
                    keys[tag]["p"]["textContent"] = date_format;
                }

            }
        }

        miniwindow()

        if (!mini_window.contains(mini_article)) {
            mini_window.appendChild(mini_article);
        }
    }

    function open_article() {
        mini_window.style.setProperty('--visibility','visible')

        document.body.appendChild(mini_window);

        const closebutton = document.getElementById("closebutton");

        closebutton.onclick = close_article
    }

    function close_article() {
        mini_window.style.setProperty('--visibility','hidden')
    }

    // FORM 3

    filter.addEventListener("change", (e) => { // TODO. Detect when option is reselected.

        const selected = e.target.value

        if (selected == "ratings") {
            filter.replaceChildren()
            let optgroupfilter = document.createElement("optgroup")
            optgroupfilter.label = "View"
            let star5 = new Option("5 stars","5 star")
            let star4 = new Option("4 star and above","4 star")
            let star3= new Option("3 star and above","3 star")
            let star2 = new Option("2 star and above","2 star")
            let star1 = new Option("1 star and above","1 star")
            optgroupfilter.appendChild(star5)
            optgroupfilter.appendChild(star4)
            optgroupfilter.appendChild(star3)
            optgroupfilter.appendChild(star2)
            optgroupfilter.appendChild(star1)
            filter.add(optgroupfilter,undefined)

            let optgroupsort = document.createElement("optgroup")
            optgroupsort.label = "Sort by"
            let highstar = new Option("High to Low","high to low")
            let lowstar = new Option("Low to High","low to high")
            let back = new Option("<- other options","other options")
            optgroupsort.appendChild(highstar)
            optgroupsort.appendChild(lowstar)
            optgroupsort.appendChild(back)
            filter.add(optgroupsort,undefined)
        }

        if (selected == "other options") {
            filter.replaceChildren()
            let recent = new Option("Most Recent","recent")
            let oldest = new Option("Oldest Review","oldest")
            let ratings = new Option("Ratings","ratings",true,true)
            filter.add(recent,undefined)
            filter.add(oldest,undefined)
            filter.add(ratings,undefined)
        }
                
    });
});