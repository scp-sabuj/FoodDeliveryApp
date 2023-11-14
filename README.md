<h1 align="center">Food Delivery App</h1>

<h2>Clone Laravel Repository:</h2>
<p>Open your terminal or command prompt and navigate to the directory where you want to install Laravel. Then, run the following command:</p>
<pre><code>git clone https://github.com/scp-sabuj/FoodDeliveryApp</code></pre>
<h2>Navigate to the Project Directory:</h2>
<pre><code>cd FoodDeliveryApp</code></pre>
<h2>Install Composer Dependencies:</h2>
<p>Run the following command to install the Composer dependencies:</p>
<pre><code>composer install</code></pre>
<h2>Create Environment File:</h2>
<p>Copy the .env.example file to create a new .env file:</p>
<pre><code>cp .env.example .env</code></pre>
<h2>Generate Application Key:</h2>
<p>Run the following command to generate a unique application key:</p>
<pre><code>php artisan key:generate</code></pre>
<h2>Configure Database:</h2>
<p>Open the .env file and configure your database settings:</p>
<pre><code>DB_DATABASE=your_database_name</code></pre>
<h2>Run Migrations:</h2>
<p>Run the following command to migrate the database:</p>
<pre><code>php artisan migrate</code></pre>
<h2>Serve the Application:</h2>
<p>Run the following command to serve the application:</p>
<pre><code>php artisan serve</code></pre>
<p>The application will be available at <a href="http://127.0.0.1:8000">http://127.0.0.1:8000</a> by default.</p>
