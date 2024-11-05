const nav = document.querySelector(".navbar")

window.addEventListener("scroll", function(){
    nav.classList.toggle("sticky", window.scrollY > 0)
})

const input = document.querySelector('.toggle input')
const newElement = document.createElement("li")
const link = document.createElement("a")
link.textContent = "Login"
link.setAttribute("href", "login/login.php")


input.addEventListener("click", () => {
    const ul = document.querySelector('.navbar ul')
    ul.classList.toggle("slide")
    nav.classList.toggle("slide")
    newElement.appendChild(link)
    ul.appendChild(newElement)
})