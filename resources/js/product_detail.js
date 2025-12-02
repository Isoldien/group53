
document.addEventListener("DOMContentLoaded", () => {
    // TODO Adjust the use of const, var or let in js

    // -------------------------------------- VARIABLES ------------------------------------------ //

    const selectedstarImg = document.getElementById("selectedstarconfig").dataset.star;
    const unselectedstarImg = document.getElementById("unselectedstarconfig").dataset.star;
    const placeholderImg = document.getElementById("placeholderconfig").dataset.star;
    const closeImg = document.getElementById("closeconfig").dataset.star;

    // CART VALUE IN HEADER
    const cart = document.querySelector("a[name='cart']")
    var add = 0 // Temp variable. PHP insertion, count the number of items in user's cart from db

    // FORM 1: Add To Cart
    const append_cart_form = document.querySelector("#append_cart");
    const increase = document.querySelector("input[name='increase']")
    const decrease = document.querySelector("input[name='decrease']") 
    const quantity = document.querySelector("input[name='quantity']")

    /* FORM 2 PART 1: Add Product Review
    * Use the create_review() when generating reviews from db. Check what values are required.
    */
    var reviewform = document.querySelector("form[id='product_review']");
    var reviewlabel = document.querySelector("label[name='reviewdescription']")
    var reviewtextarea = document.querySelector("textarea[name='reviewtextarea']")
    const reviewtitle = document.querySelector("input[name='title']")
    const reviewtitleplaceholder = reviewtitle.placeholder
    const reviewtextareaplaceholder = reviewtextarea.placeholder
    const labels = document.querySelectorAll("#stars label");
    const reviewarticleslist = document.querySelectorAll("#reviewarticles article")
    const noreviewsmsg = document.querySelector("#noreviews")

    // CUSTOMER REVIEWS: Mini Window

    var once_elements = [
    {"div": {
        class:"flex flex-row justify-between w-full",
        form: {
            class: "flex",
            label: {
                "input" : {
                    class : "hidden",
                    name:"star",
                    type:"radio",
                    readOnly:true
                    },
                "img": {
                    class:"w-6 h-auto bg-transparent hover:opacity-80",
                    src: selectedstarImg 
                }
            }
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
                textContent : "Reviewer name"
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
    generate_article(once_elements, mini_article)
    mini_window.appendChild(mini_article)

    /* FORM 3: FILTERS

    const filter = document.getElementById("filters")

    */

    // -------------------------------------- FUNCTIONS ------------------------------------------ //


    // FORM 1

    function add_to_cart(quantity) {
        
        add += Number(quantity)

        const content = getComputedStyle(cart, '::after').content;

        if (((content == "none") || (content == "normal") || (content == ""))) {
            console.log("empty")
        }

        cart.style.setProperty('--after-content','"(' + add + ')"')
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

    function generate_reviews(username, rating, comment, date) {
        const new_review = document.createElement("article")
        new_review.className = "flex gap-3 items-center w-full"
        
        var new_review_components = [
            {form : rating},
            {p : null}
        ]

        for (var keys of new_review_components) {
            for (var tag in keys) {

                if (tag == "form") {
                    const form = document.createElement("form")
                    const star_rating = keys[tag]
                    form.className = "flex items-center flex-row-reverse"

                    for (let i = 1; i < 6; i++) {

                        const star_label = document.createElement("label")
                        var star_img = selectedstarImg

                        if (star_rating >= i) {
                            star_img = unselectedstarImg
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
                        var p_tag = document.createElement("p")

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
            open_article()
            console.log("clicked")
        })
    }

    function create_reviews(username, stars, comment, date) { // PHP Insertion. USE THIS FOR CREATING REVIEWS FROM DB

        generate_reviews(username, stars ,comment, date)

        if (reviewarticles.contains(noreviewsmsg)) {
            reviewarticles.removeChild(noreviewsmsg)
        }
        
        // location.reload()

        reviewtitle.value = "";
        reviewtextarea.value = "";
        clearstars();
    }

    labels.forEach(label => {
        label.addEventListener("mouseenter", (e) => {
            e.currentTarget.classList.add("checked-before-hover");

            for (const l of labels) {
                if (!l.classList.contains("checked-before-hover")) {
                    l.classList.add("checked-before-hover");
                } else {
                    break;
                }
            }
        });

        label.addEventListener("mouseleave", (e) => {
            e.currentTarget.classList.remove("checked-before-hover");

            for (const l of labels) {
                const input = l.querySelector("input");
                if (!input.checked) {
                    l.classList.remove("checked-before-hover");
                }
            }
        });

        label.addEventListener("click", (e) => {

            clearstars()

            for (const l of labels) {
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
        for (const l of labels) {
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

        for (const l of labels) {
            const input = l.querySelector("input");
            
            if (input.checked) {
                total_stars += 1
            }
        }

        const username = "Username";
        const comment = reviewtextarea.value;
        const date = new Date()
        const date_format = date.getDay() + "/" + date.getMonth() + "/" + date.getFullYear()

        if (reviewarticles.contains(noreviewsmsg)) {
            reviewarticles.removeChild(noreviewsmsg)
        }

        generate_reviews(username, total_stars ,comment, date_format)
        //location.reload()

        reviewtitle.value = "";
        reviewtextarea.value = "";
        clearstars();
    })

    // CUSTOMER REVIEWS Mini Window

    function validHTMLTag(tag) {
        const el = document.createElement(tag);
        return !(el instanceof HTMLUnknownElement);
    }

    function checkHasChild(element) {
        const isObject = (typeof element === "object");
        const isNotNull = (element !== null);
        const hasKeys = (Object.keys(element).length > 0);

        return isObject && isNotNull && hasKeys;
    }

    function hasChild(dictionary, parent) {

        for (var children in dictionary) {
            const value = dictionary[children]

            if (children === "textContent") { // TODO Check if I can remove this.
                parent.textContent = value;

            } else if ( validHTMLTag(children) ) {

                if (children == "label") {
                    for (let i = 0; i< 5; i++) {
                        const e = document.createElement(children)

                        if (checkHasChild(value)) {
                            hasChild(value, e)
                        }

                        parent.appendChild(e);
                    }
                } else {
                    const e = document.createElement(children)

                    if (checkHasChild(value)) {
                        hasChild(value, e)
                    }

                    parent.appendChild(e);
                }

            } else {
                parent.setAttribute(children, value)
            }

        }
    }

    function generate_article(list , parent) {

        for (var keys of list) {

            for (var tag in keys) {

                const e = document.createElement(tag)

                if (checkHasChild(keys[tag])) {
                    hasChild(keys[tag], e)
                }
                
                parent.appendChild(e)
            }
        }
    }

    function open_article() {
        mini_window.style.setProperty('--visibility','visible')

        document.body.appendChild(mini_window);

        const closebutton = document.getElementById("closebutton");

        closebutton.addEventListener("click", () => {
            close_article()
        })

    }

    function close_article() {
        mini_window.style.setProperty('--visibility','hidden')
    }

    /* FORM 3

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
                
    }); */
    
});