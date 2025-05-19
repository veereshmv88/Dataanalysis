  // Generate random data for the predictions
        function generateRandomData() {
        
            // Shuffle and select 3 products
            const shuffledProducts = [...products].sort(() => 0.5 - Math.random());
            const selectedProducts = shuffledProducts.slice(0, 3).map(product => {
                const variation = Math.floor(Math.random() * 200) - 100;
                return {
                    name: product.name,
                    value: Math.max(100, product.base + variation)
                };
            });
            
            return {
                revenue: randomRevenue,
                revenueChange: revenueChange,
                products: selectedProducts
            };
        }
        
        // Format currency
        function formatCurrency(value) {
            return '$' + value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        }
        
        // Render revenue prediction
        function renderRevenuePrediction(data) {
            const revenueContent = document.getElementById('revenue-content');
            const trendClass = data.revenueChange > 0 ? 'trend-up' : 
                             data.revenueChange < 0 ? 'trend-down' : 'trend-neutral';
            const trendIcon = data.revenueChange > 0 ? '↑' : 
                            data.revenueChange < 0 ? '↓' : '→';
            
            revenueContent.innerHTML = `
                <div class="data-label">Next Quarter Projection</div>
                <div class="data-value">${formatCurrency(data.revenue)}</div>
                <div class="trend-indicator ${trendClass}">
                    ${trendIcon} ${Math.abs(data.revenueChange)}% from previous
                </div>
                <div style="margin-top: 1.5rem; width: 100%; height: 100px; position: relative;">
                    <div style="position: absolute; bottom: 0; left: 0; right: 0; height: 1px; background-color: var(--border-color);"></div>
                    ${[20, 40, 60, 80, 100].map((perc, i) => `
                        <div style="position: absolute; bottom: 0; left: ${i * 20}%; width: 15%; height: ${perc - Math.random() * 20}%; background-color: var(--accent-blue);"></div>
                    `).join('')}
                </div>
            `;
        }
        
        // Render demand prediction
        function renderDemandPrediction(data) {
            const demandContent = document.getElementById('demand-content');
            
            demandContent.innerHTML = `
                <div class="data-label">Top Products Next Month</div>
                <div style="width: 100%; margin: 1rem 0;">
                    ${data.products.map(product => `
                        <div style="display: flex; justify-content: space-between; margin-bottom: 1rem; align-items: center;">
                            <span style="flex: 1;">${product.name}</span>
                            <span style="font-weight: bold; color: var(--primary-blue);">${product.value} units</span>
                            <div style="width: 60px; height: 8px; background-color: var(--light-blue); margin-left: 1rem; border-radius: 4px;">
                                <div style="width: ${Math.min(100, (product.value / 1500) * 100)}%; height: 100%; background-color: var(--accent-blue); border-radius: 4px;"></div>
                            </div>
                        </div>
                    `).join('')}
                </div>
                <div style="font-size: 0.85rem; color: var(--secondary-blue); text-align: center;">
                    Updated: ${new Date().toLocaleDateString()}
                </div>
            `;
        }
        
        // Initialize the page
        document.addEventListener('DOMContentLoaded', function() {
            // Set current year in footer
            document.getElementById('current-year').textContent = new Date().getFullYear();
            
            // Generate and render random data
            const data = generateRandomData();
            renderRevenuePrediction(data);
            renderDemandPrediction(data);
            
            // Add hover effects
            const boxes = document.querySelectorAll('.prediction-box, .middle-box');
            boxes.forEach(box => {
                box.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-5px)';
                    this.style.boxShadow = '0 10px 25px rgba(0, 0, 0, 0.12)';
                });
                
                box.addEventListener('mouseleave', function() {
                    this.style.transform = '';
                    this.style.boxShadow = '0 4px 12px rgba(0, 0, 0, 0.08)';
                });
            });
        });
    </script>
<!-- Code injected by live-server -->
<script>
	// <![CDATA[  <-- For SVG support
	if ('WebSocket' in window) {
		(function () {
			function refreshCSS() {
				var sheets = [].slice.call(document.getElementsByTagName("link"));
				var head = document.getElementsByTagName("head")[0];
				for (var i = 0; i < sheets.length; ++i) {
					var elem = sheets[i];
					var parent = elem.parentElement || head;
					parent.removeChild(elem);
					var rel = elem.rel;
					if (elem.href && typeof rel != "string" || rel.length == 0 || rel.toLowerCase() == "stylesheet") {
						var url = elem.href.replace(/(&|\?)_cacheOverride=\d+/, '');
						elem.href = url + (url.indexOf('?') >= 0 ? '&' : '?') + '_cacheOverride=' + (new Date().valueOf());
					}
					parent.appendChild(elem);
				}
			}
			var protocol = window.location.protocol === 'http:' ? 'ws://' : 'wss://';
			var address = protocol + window.location.host + window.location.pathname + '/ws';
			var socket = new WebSocket(address);
			socket.onmessage = function (msg) {
				if (msg.data == 'reload') window.location.reload();
				else if (msg.data == 'refreshcss') refreshCSS();
			};
			if (sessionStorage && !sessionStorage.getItem('IsThisFirstTime_Log_From_LiveServer')) {
				console.log('Live reload enabled.');
				sessionStorage.setItem('IsThisFirstTime_Log_From_LiveServer', true);
			}
		})();
	}
	else {
		console.error('Upgrade your browser. This Browser is NOT supported WebSocket for Live-Reloading.');
	}
	// ]]>