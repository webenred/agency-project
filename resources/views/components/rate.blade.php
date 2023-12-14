<link rel="stylesheet" href="{{ asset('storage/styles/rating.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


<div class="stars">
    <span data-id="1" class="fa fa-star"></span>
    <span data-id="2" class="fa fa-star"></span>
    <span data-id="3" class="fa fa-star"></span>
    <span data-id="4" class="fa fa-star"></span>
    <span data-id="5" class="fa fa-star"></span>
</div>

<script>
    const allStar = document.querySelectorAll(".stars span.fa.fa-star");
    const rateInput = document.querySelector("input[name=rating]");
    allStar.forEach((star) => {
        star.onclick = (event) => {
            event.stopPropagation();
            for (let index = 0; index <= 4; index++) {
                allStar[index].classList.contains('checked') ? allStar[index].classList.remove('checked') :
                    null
            }
            rating = event.target.getAttribute("data-id");
            rateInput.value = rating;
            for (let index = rating - 1; index >= 0; index--) {
                allStar[index].classList.add('checked');
            }
        };
    });
</script>
