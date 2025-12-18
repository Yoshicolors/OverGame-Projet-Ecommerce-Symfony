# Script pour corriger les appels getReference() dans les fixtures

$files = @(
    "OrderFixtures.php",
    "ImageFixtures.php",
    "ProductFixtures.php",
    "OrderItemFixtures.php"
)

$basePath = "C:\Users\Administrateur\Desktop\BUT\BUT3\Prog_Avancee\OverGame-Projet-Ecommerce-Symfony\symfony_boilerplate-main\src\DataFixtures"

foreach ($file in $files) {
    $filePath = Join-Path $basePath $file
    $content = Get-Content $filePath -Raw
    
    # Remplacements spécifiques par fichier
    switch ($file) {
        "OrderFixtures.php" {
            $content = $content -replace '\$this->getReference\(\$orderData\[''user''\]\)', '$this->getReference($orderData[''user''], \App\Entity\User::class)'
        }
        "ImageFixtures.php" {
            $content = $content -replace '\$this->getReference\(''product-'' \. \$i\)', '$this->getReference(''product-'' . $i, \App\Entity\Product::class)'
        }
        "ProductFixtures.php" {
            $content = $content -replace '\$this->getReference\(\$productData\[''category''\]\)', '$this->getReference($productData[''category''], \App\Entity\Category::class)'
        }
        "OrderItemFixtures.php" {
            $content = $content -replace '\$this->getReference\(OrderFixtures::', '$this->getReference(OrderFixtures::' -replace '::ORDER_\d+\)\)', '::ORDER_\d+, \App\Entity\Order::class))'
            $content = $content -replace '\$this->getReference\(''product-\d+''\)', '$this->getReference(''product-\d+'', \App\Entity\Product::class)'
        }
    }
    
    Set-Content -Path $filePath -Value $content
    Write-Host "Fixed: $file"
}

Write-Host "All files fixed!"
