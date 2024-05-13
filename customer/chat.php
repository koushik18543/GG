<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voice Search</title>
</head>
<body>
    <h1>Voice Search</h1>
    <div>
        <button id="startButton">Start Voice Search</button>
    </div>
    <div id="results"></div>

    <script>
        const startButton = document.getElementById('startButton');
        const resultsDiv = document.getElementById('results');

        startButton.addEventListener('click', () => {
            const recognition = new webkitSpeechRecognition();
            recognition.lang = 'en-US';

            recognition.onresult = (event) => {
                const voiceInput = event.results[0][0].transcript;
                fetchResults(voiceInput);
            };

            recognition.start();
        });

        function fetchResults(query) {
            fetch(`search.php?query=${query}`)
                .then(response => response.json())
                .then(data => displayResults(data))
                .catch(error => console.error(error));
        }

        function displayResults(results) {
            resultsDiv.innerHTML = ''; // Clear previous results

            for (const result of results) {
                const productDiv = document.createElement('div');
                productDiv.innerHTML = `
                    <img src="${result.image}" alt="${result.name}">
                    <p>Name: ${result.name}</p>
                    <p>Price: ${result.price}</p>
                    <p>Discount: ${result.discount}</p>
                `;
                resultsDiv.appendChild(productDiv);
            }
        }
    </script>
</body>
</html> -->

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        /* Add CSS styles for card view */
        .card {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            margin: 10px;
            display: block;
            width: 200px;
        }
        
        .card img {
            max-width: 100%;
            height: auto;
        }
        #alexa {
            position: fixed;
            bottom: 20px;
            right: 20px;
            width: 60px;
            height: 60px;
            background-color: #2ecc71;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            cursor: pointer;
            /* animation: glow 1s infinite alternate; */
        }
        
        #alexa img {
            max-width: 100%;
            /* mix-blend-mode:darken;    */
            height: auto;
        }

        /* @keyframes glow {
            0% {
                box-shadow: 0 0 10px rgba(46, 204, 113, 0.6);
            }
            100% {
                box-shadow: 0 0 20px rgba(46, 204, 113, 1);
            }
        } */
    </style>
    <script src="https://kit.fontawesome.com/c186916733.js" crossorigin="anonymous"></script>
</head>
<body>
    <!-- <h1>Voice Search</h1> -->
    <!-- <div>
        <button id="startButton">Start Voice Search</button>
    </div> -->
    <div id="alexa">
        <i class="fa-solid fa-microphone fa-flip fa-lg" title="click for voice search"></i>
    </div>
    <!-- ... -->
    <div id="results" class="card-container"></div>
    <script>
    // const startButton = document.getElementById('startButton');
    const resultsDiv = document.getElementById('results');
    const alexaButton = document.getElementById('alexa');


    // startButton.addEventListener('click', () => {
        // const recognition = new webkitSpeechRecognition();
    //     recognition.lang = 'en-US';

    //     recognition.onresult = (event) => {
    //         const voiceInput = event.results[0][0].transcript;
    //          fetchResults(voiceInput);
    //         };

            

    //         recognition.start();
    //     });
    alexaButton.addEventListener('click', () => {
        const recognition = new webkitSpeechRecognition();
        recognition.lang = 'en-US';

        recognition.onresult = (event) => {
            const voiceInput = event.results[0][0].transcript;
            fetchResults(voiceInput);
        };

        recognition.start();
    });

        function fetchResults(query) {
            fetch(`search.php?query=${query}`)
                .then(response => response.json())
                .then(data => displayResults(data))
                .catch(error => console.error(error));
        }
        // ... Existing JavaScript code ...

        // function displayResults(results) {
        //     resultsDiv.innerHTML = ''; // Clear previous results

        //     // Clear existing products from the productsSection
        //     const productsSection = document.getElementById('productsSection');
        //     productsSection.innerHTML = '';

        //     for (const result of results) {
        //         const productCard = document.createElement('div');
        //         productCard.classList.add('card'); // Apply card class

        //         productCard.innerHTML = `
        //             <img src="${result.image}" alt="${result.name}">
        //             <p>Name: ${result.name}</p>
        //             <p>Price: ${result.price}</p>
        //             <p>Discount: ${result.discount}</p>
        //         `;

        //         resultsDiv.appendChild(productCard);
        //     }
        // }

        function displayResults(results) 
        {
            resultsDiv.innerHTML = ''; // Clear previous results

            // Clear existing products from the productsSection
            const productsSection = document.getElementById('productsSection');
            productsSection.innerHTML = '';

            // Create a new row for the search results
            const newRow = document.createElement('div');
            newRow.classList.add('row');

            for (const result of results) {
                const productCard = document.createElement('div');
                productCard.classList.add('col-lg-3', 'col-md-3', 'col-sm-12'); // Apply Bootstrap grid classes
                // productCard.classList.add('card-title bg-info text-white p-2 text-uppercase'); // Apply Bootstrap grid classes
                productCard.classList.add('card'); // Apply card class

                productCard.innerHTML = `
                    <form>
                        <h6 class="card-title bg-info text-white p-2 text-uppercase" style="width: 100%; border-radius: 20px;">${result.name} </h6>
                        <img src="image/${result.image}" alt="${result.name}">
                        <h6>&#8377;${result.price} <span> (${result.discount}%off) </h6> </span>
                        <h6 class="badge badge-success"> 4.4 <i class="fa fa-star"> </i> </h6>
                        <input type="number" name="" class="form-control" placeholder="Quantity">
                        <br>
                        <div class="btn-group d-flex">
                            <button class="btn btn-success flex-fill">Add to cart</button> <button class="btn btn-warning flex-fill text-white">Buy Now</button> <!-- Add the button -->
                        </div>
                    </form>
                `;

                newRow.appendChild(productCard); // Add the new product card to the row
            }

            productsSection.appendChild(newRow); // Add the new row to the productsSection
            
        }
        


    </script>
</body>
</html>
