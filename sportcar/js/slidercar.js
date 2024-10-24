
        let currentIndex = 0;
        const slides = document.querySelectorAll('.car-slide');
        const totalSlides = slides.length -2;

        const updateSlidePosition = () => {
            const slideWidth = document.querySelector('.car-slide').clientWidth;
            document.querySelector('.car-slides').style.transform = `translateX(-${currentIndex * slideWidth}px)`;
        };

        const nextSlide = () => {
            currentIndex = (currentIndex + 1) % totalSlides;
            console.log(currentIndex);
            updateSlidePosition();
        };

        const prevSlide = () => {
            currentIndex = (currentIndex - 1 + totalSlides) % totalSlides;
            console.log(currentIndex);
            updateSlidePosition();
        };

        document.querySelector('.next').addEventListener('click', nextSlide);
        document.querySelector('.prev').addEventListener('click', prevSlide);

        setInterval(nextSlide, 15000); 

        updateSlidePosition(); // Initial call to set the correct initial state