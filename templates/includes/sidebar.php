<div id="templatemo_left_column">  
    <div id="templatemo_sidebar" class="mt-3">
        <h4>Categories</h4>
        <ul class="templatemo_list">
            <?php foreach ($categories as $category): ?>
            <li><a href="/?act=filterPost&id=<?=$category['id']?>"><?=$category['name']?></a></li>
            <?php endforeach; ?>
        </ul>
        <div class="cleaner_h40"></div> 
    </div> <!-- end of templatemo_sidebar --> 
</div> <!-- end of templatemo_left_column -->
