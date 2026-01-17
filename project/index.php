<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enhanced Car Showcase</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Enhanced Car Showcase</h1>
        <p>Explore amazing cars with details, search, and more! Add your own images below.</p>
    </header>
    <div class="container">

       

        <br><br>
        

        <div id="car-grid" class="car-grid">
    
            <div class="car-card" data-name="Tesla Model S">
                <img src="tesla.jpg" alt="Tesla Model S"> 
                <h3>Tesla Model S</h3>
                <p>Electric luxury sedan with autopilot.</p>
                <div class="rating">Rating: ★★★★★</div>
                <div class="specs">
                    <ul>
                        <li>Price: $80,000</li>
                        <li>Engine: Electric</li>
                        <li>Top Speed: 140 mph</li>
                    </ul>
                </div>
            </div>
            
      
            <div class="car-card" data-name="Ford Mustang">
                <img src="mustang.jpg" alt="Ford Mustang"> 
                <h3>Ford Mustang</h3>
                <p>Iconic American muscle car.</p>
                <div class="rating">Rating: ★★★★☆</div>
                <div class="specs" style="display:none;">
                    <ul>
                        <li>Price: $55,000</li>
                        <li>Engine: V8</li>
                        <li>Top Speed: 155 mph</li>
                    </ul>
                </div>
            </div>
            
     
            <div class="car-card" data-name="BMW M5">
                <img src="bmwm5.jpg" alt="BMW M5"> 
                <h3>BMW M5CS</h3>
                <p>BMW M5 CS — pure adrenaline, refined.</p>
                <div class="rating">Rating: ★★★★★</div>
                <div class="specs" style="display:none;">
                    <ul>
                        <li>Price: $147,000</li>
                        <li>Engine: V8</li>
                        <li>Top Speed: 190 mph</li>
                    </ul>
                </div>
            </div>
            
      
            <div class="car-card" data-name="Lamborghini Huracan">
                <img src="huracan.jpg" alt="Lamborghini Huracan">
                <h3>Lamborghini Huracan</h3>
                <p>Italian supercar with V10 engine.</p>
                <div class="rating">Rating: ★★★★★</div>
                <div class="specs" style="display:none;">
                    <ul>
                        <li>Price: $261,000</li>
                        <li>Engine: V10</li>
                        <li>Top Speed: 202 mph</li>
                    </ul>
                </div>
            </div>
           
            <div class="car-card" data-name="Porsche 911">
                <img src="porsche.jpg" alt="Porsche 911"> 
                <h3>Porsche 911</h3>
                <p>Legendary sports car with precision handling.</p>
                <div class="rating">Rating: ★★★★★</div>
                <div class="specs" style="display:none;">
                    <ul>
                        <li>Price: $114,000</li>
                        <li>Engine: Flat-6</li>
                        <li>Top Speed: 191 mph</li>
                    </ul>
                </div>
            </div>
            
          
            <div class="car-card" data-name="Ferrari 488">
                <img src="ferrari.jpg" alt="Ferrari 488"> 
                <h3>Ferrari 488</h3>
                <p>High-performance GT car.</p>
                <div class="rating">Rating: ★★★★★</div>
                <div class="specs" style="display:none;">
                    <ul>
                        <li>Price: $330,000</li>
                        <li>Engine: V8 Turbo</li>
                        <li>Top Speed: 205 mph</li>
                    </ul>
                </div>
            </div>
            
     
            <div class="car-card" data-name="Audi R8">
                <img src="audir8.jpg" alt="Audi R8"> 
                <h3>Audi R8</h3>
                <p>German supercar with quattro all-wheel drive.</p>
                <div class="rating">Rating: ★★★★☆</div>
                <div class="specs" style="display:none;">
                    <ul>
                        <li>Price: $169,000</li>
                        <li>Engine: V10</li>
                        <li>Top Speed: 205 mph</li>
                    </ul>
                </div>
            </div>
            
        
            <div class="car-card" data-name="McLaren 720S">
                <img src="mclaren.jpg" alt="McLaren 720S"> 
                <h3>McLaren 720S</h3>
                <p>Ultra-lightweight hypercar.</p>
                <div class="rating">Rating: ★★★★★</div>
                <div class="specs" style="display:none;">
                    <ul>
                        <li>Price: $299,000</li>
                        <li>Engine: V8 Twin-Turbo</li>
                        <li>Top Speed: 212 mph</li>
                    </ul>
                </div>
            </div>
            
        
            <div class="car-card" data-name="Bugatti Chiron">
                <img src="bugatti.jpg" alt="Bugatti Chiron"> 
                <h3>Bugatti Chiron</h3>
                <p>The fastest production car ever.</p>
                <div class="rating">Rating: ★★★★★</div>
                <div class="specs" style="display:none;">
                    <ul>
                        <li>Price: $3,000,000</li>
                        <li>Engine: W16 Quad-Turbo</li>
                        <li>Top Speed: 261 mph</li>
                    </ul>
                </div>
            </div>
            
        
            <div class="car-card" data-name="Toyota Supra">
                <img src="supra.jpg" alt="Toyota Supra"> 
                <h3>Toyota Supra</h3>
                <p>Beast on the Road.</p>
                <div class="rating">Rating: ★★★☆☆</div>
                <div class="specs" style="display:none;">
                    <ul>
                        <li>Price: $100k</li>
                        <li>Engine: v12</li>
                        <li>Top Speed: 200 mph</li>
                    </ul>
                </div>
            </div>
        </div>
        
       
        <div id="modal" class="modal">
            <div class="modal-content">
                <span id="close-modal" class="close">&times;</span>
                <img id="modal-image" src="" alt="Car Image">
                <h2 id="modal-name"></h2>
                <p id="modal-description"></p>
                <ul id="modal-specs"></ul>
                <div class="rating">
                    <span>Rating: </span>
                    <span id="modal-rating"></span>
                </div>
            </div>
        </div>
    </div>
    <footer>
        <p>&copy; 2026 Car Showcase. Built with HTML, CSS,JS and PHP.</p>
    </footer>
    <script src="script.js"></script>
</body>
</html>