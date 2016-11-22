<html>
    <head>
        <link href="file/diff/style.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <div class="left">
            <ol>                
                <?php
                //echo 'read json file2.json to array <br/>';
                $filename = 'list.json';
                $data = file_get_contents($filename);
                $data = json_decode($data, true);
                $size_list=  sizeof($data);
                foreach ($data as $key => $value) {
                    echo '<li>'.$value.'</li>';
                }
                
                $dir    = './file/data';
                $files1 = scandir($dir);
                $size_file = sizeof($files1)-2;
                //var_dump($size_list,$size_file,$files1);die;
                if($size_list<$size_file){
                    for ($i=$size_list;$i<$size_file;$i++){
                         echo '<li>no title</li>';
                    }
                }

               
                ?>
            </ol>
        </div>
        <div class="center">
            <div class="center1" id="copy1">Result value element</div>
            <div class="center2">

                <div><textarea placeholder="value element"></textarea></div>
                <div>
                    <button onclick="add()">add</button>
                    <button onclick="copy1()">copy1</button>
                    <button onclick="view1()">view</button>
                </div>
            </div>
        </div>
        <div class="right">
            <div class="right1" id="copy2">Result value want copy</div>
            <div class="right2">
                <div><textarea placeholder="value want copy"></textarea></div>
                <div>
                    <button onclick="copy2()">copy2</button>
                    <button onclick="view2()">view</button>
                    <button onclick="reload()">reload</button>
                </div>
            </div>
        </div>
		<?php include 'pupop.php';?>
		
        <script src="file/diff/jquery2.0.js" type="text/javascript"></script>
        <script src="file/diff/script.js" type="text/javascript"></script>
    </body>
</html>