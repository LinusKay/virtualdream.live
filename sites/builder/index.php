<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Virtual Dream Website Builder</title>
    <style>
        body {
            background: blue;
        }
        #creation-render {
            width: 1000px;
            height:800px;
            border: solid 1px black;
            box-sizing: border-box;
            margin:auto;
            position:relative;
        }
        #creation-render * {
            user-drag: none;
            -webkit-user-drag: none;
            user-select: none;
            -moz-user-select: none;
            -webkit-user-select: none;
            -ms-user-select: none;
        }
        #creation-render *:hover {
            border: dashed 1px gray;
            box-sizing: border-box;
        }
        .creation-input {
            width:600px;
            height:200px;
            margin:15px auto;
            display:block;
            
            border: solid 1px black;
            box-sizing: border-box;
        }

        #image-gallery {
            width:500px;
            height:400px;
            border:solid 1px black;
            overflow-y:scroll;
            margin: 10px 0;
            background:white;
        }
        .image-gallery-thumb {
            width: 150px;
            height: 150px;
            display:block;
            float:left;
        }

        .border-highlight {
            background-image: linear-gradient(90deg, blue 50%, transparent 50%), linear-gradient(90deg, blue 50%, transparent 50%), linear-gradient(0deg, blue 50%, transparent 50%), linear-gradient(0deg, blue 50%, transparent 50%);
            background-repeat: repeat-x, repeat-x, repeat-y, repeat-y;
            background-size: 15px 2px, 15px 2px, 2px 15px, 2px 15px;
            background-position: left top, right bottom, left bottom, right top;
            animation: border-dance 0.5s infinite linear;
        }
        @keyframes border-dance {
            0% {
                background-position: left top, right bottom, left bottom, right top;
            }

            100% {
                background-position: left 15px top, right 15px bottom, left bottom 15px, right top 15px;
            }
        }
        .section-title {
            text-align:center;
            opacity:0.5;
            font-family:Arial, Helvetica, sans-serif;
            margin: 5px;
        }
        #controls {
            width:800px;
            margin:15px auto;
            font-family:Arial, Helvetica, sans-serif;
            background:rgb(253, 251, 214);
            padding:10px;
        }
        #controls input, select {
            margin: 10px 10px 0 0;
        }
        #tool-description {
            color:grey;
        }
        #image-select {
            width:500px;
        }
        #page-width, #page-height {
            width:50px;
        }
    </style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/js-beautify/1.15.1/beautify-html.js"></script>
    <script src="builder.js"></script>
</head>
<body> 
    <div id="creation-render"></div>
    <div id="controls">
        <label for="tool-select">Select Tool:</label>
        <select id="tool-select" onchange="toolChanged()">
            <option value="pagesettings">📄 Page Settings</option>
            <option value="create">➕ Create</option>
            <option value="edit">✏️ Edit</option>
            <option value="drag">✊ Drag</option>
            <option value="rotate">🔁 Rotate</option>
            <option value="scale">↔️ Scale</option>
            <option value="delete">❌ Delete</option>
        </select>
        <p id="tool-description"></p>

        <div id="create-options" style="display: none;">
            <label for="create-type-select">Select Element Type:</label>
            <select id="create-type-select" onchange="toolCreateOptionTypeChanged()">
                <option value="text">Text</option>
                <option value="image">Image</option>
            </select>

            <div id="create-text-options" style="display: none;">
                <label for="font-select">Font:</label>
                <select id="font-select" onchange="toolCreateOptionTextFontChanged()">
                    <option value="Arial">Arial</option>
                    <option value="Times New Roman">Times New Roman</option>
                </select>

                <label for="text-size">Text Size (px):</label>
                <input type="number" id="text-size-number" value="16" min="1" required oninput="toolCreateOptionTextSizeChanged(this)" onchange="toolCreateOptionTextSizeChanged(this)">
                <input type="range" id="text-size-range" min="1" max="100" value="16" oninput="toolCreateOptionTextSizeChanged(this)" onchange="toolCreateOptionTextSizeChanged(this)">

                <br>
                <label for="text-colour">Text Colour:</label>
                <input type="color" id="text-colour" oninput="toolCreateOptionTextColourChanged()" onchange="toolCreateOptionTextColourChanged()">

                <label for="text-boldness">Text Boldness:</label>
                <select id="text-boldness" onchange="toolCreateOptionTextBoldnessChanged()">
                    <option value="normal">Normal</option>
                    <option value="bold">Bold</option>
                    <option value="bolder">Bolder</option>
                    <option value="lighter">Lighter</option>
                </select>

                <label for="text-italic">Text Italic:</label>
                <input type="checkbox" id="text-italic" onchange="toolCreateOptionTextItalicChanged()">

                <br>
                <label for="text-input">Text: </label>
                <input id="text-input" required onchange="toolCreateOptionTextInput()" onpaste="toolCreateOptionTextInput()" oninput="toolCreateOptionTextInput()" value="Insert text!">

                <p id="text-preview"></p>
            </div>

            <div id="create-image-options" style="display: none;">
                <img id="image-preview" src="http://localhost/virtualdream.live/src/assets/img/shock.gif" alt="Image preview">
                <br>
                <label for="image-select">Input Image:</label>
                <br>
                <input type="text" id="image-select" value="http://localhost/virtualdream.live/src/assets/img/shock.gif" oninput="toolCreateOptionImageSelectChanged()" onchange="toolCreateOptionImageSelectChanged()">
                <p>Or, choose from the gallery:</p>
                <div id="image-gallery">
                    <?php
                        function getAllImages($directory) {
                            $imageFiles = [];
                        
                            // Define directories to exclude (relative paths from $directory)
                            $excludeDirs = ['audioplayer', 'webrings'];

                            // Define files to exclude by name
                            $excludeFiles = ['vdbanner.png'];
                        
                            // Callback function to exclude specific directories
                            $filter = function ($file, $key, $iterator) use ($excludeDirs, $excludeFiles) {
                                if ($iterator->hasChildren() && !in_array($file->getFilename(), $excludeDirs)) {
                                    return true;
                                }
                                return $file->isFile() && in_array($file->getExtension(), ['jpg', 'jpeg', 'png', 'gif']) &&
                                !in_array($file->getFilename(), $excludeFiles);
                            };
                        
                            $directoryIterator = new RecursiveDirectoryIterator($directory, RecursiveDirectoryIterator::SKIP_DOTS);
                            $filteredIterator = new RecursiveCallbackFilterIterator($directoryIterator, $filter);
                            $iterator = new RecursiveIteratorIterator($filteredIterator, RecursiveIteratorIterator::SELF_FIRST);
                        
                            foreach ($iterator as $file) {
                                if ($file->isFile()) {
                                    $imageFiles[] = $file->getPathname();
                                }
                            }
                        
                            return $imageFiles;
                        }
                        
                        $directory = "../../src/assets/img/";
                        $imageFiles = array_reverse(getAllImages($directory));

                        
                        foreach ($imageFiles as $file) {
                            echo "<img src='$file' class='image-gallery-thumb' onclick='toolCreateOptionImageGallerySelect(this)'>";
                        }
                        
                    ?>
                </div>
            </div>
            <button id="create-button" onclick="toolCreateInsertElement()">Add Element</button>
        </div>

        <div id="drag-options" style="display:none;">
            <label for="drag-bounds">Drag Boundary:</label>
            <input type="checkbox" id="drag-bounds" checked>
            <label for="drag-clone">Clone Drag:</label>
            <input type="checkbox" id="drag-clone">
        </div>

        <div id="delete-options" style="display:none;">
            <label for="delete-confirm">Delete Confirmation:</label>
            <input type="checkbox" id="delete-confirm" checked>
        </div>

        <div id="page-settings" style="display:none;">
            <label for="page-width">Page Width (px):</label>
            <input type="number" id="page-width" value="1000" min="1" required oninput="toolPageSettingsOptionPageSizeChanged()" onchange="toolPageSettingsOptionPageSizeChanged()">
            <label for="page-height">Page Height (px):</label>
            <input type="number" id="page-height" value="800" min="1" required oninput="toolPageSettingsOptionPageSizeChanged()" onchange="toolPageSettingsOptionPageSizeChanged()">
            <br>
            <label for="background-colour">Background Colour:</label>
            <input type="color" id="background-colour" oninput="toolPageSettingsOptionBackgroundColourChanged()" onchange="toolPageSettingsOptionBackgroundColourChanged()">
            <br>
            <label for="image-select">Background Image:</label>
            <br>
            <input type="text" id="image-select" value="http://localhost/virtualdream.live/src/assets/img/shock.gif" oninput="toolPageSettingsOptionBackgroundImageSelectChanged()" onchange="toolPageSettingsOptionBackgroundImageSelectChanged()">
            <p>Or, choose from the gallery:</p>
            <div id="image-gallery">
                <?php
                    foreach ($imageFiles as $file) {
                        echo "<img src='$file' class='image-gallery-thumb' onclick='toolPageSettingsOptionBackgroundImageGallerySelect(this)'>";
                    } 
                ?>
            </div>
        </div>
    </div>

    <p class="section-title">body (HTML)</p>
    <textarea id="creation-input-body" class="creation-input" onchange="updateHTMLOutput()" onkeypress="updateHTMLOutput()" onpaste="updateHTMLOutput()" oninput="updateHTMLOutput()">

&lt;html xmlns="http://www.w3.org/1999/xhtml"&gt;&lt;head&gt;&lt;meta charset="UTF-8" style="cursor: default;" /&gt;&lt;meta name="viewport" content="width=device-width, initial-scale=1.0" style="cursor: default;" /&gt;&lt;title style="cursor: default;"&gt;My Website!&lt;/title&gt;&lt;/head&gt;&lt;body&gt;&lt;div id="wrapper-background" style="width: 1000px; height: 800px; position: absolute; background: url(http://virtualdream.dev/src/assets/img/stickers/dragon.gif) rgb(115, 203, 232); z-index: -9999; cursor: default;"&gt;&lt;/div&gt;&lt;p style="font-family: Arial; font-size: 68px; color: rgb(238, 255, 0); font-style: italic; font-weight: bolder; position: absolute; top: 182px; left: 671px; cursor: default; margin: 0px; width: 329px; height: 125px;" class=""&gt;hellllo whats up!! hello whats up!!&lt;/p&gt;&lt;img src="../../src/assets/img/shock.gif" style="cursor: default; position: absolute; margin: 0px; left: 828px; top: 619px;" class="" /&gt;&lt;img src="http://virtualdream.dev/src/assets/img/gitara.gif" alt="Image preview" style="cursor: default; position: absolute; margin: 0px; left: 33.8427px; top: 509.082px; width: 365px; height: 269px; transform: rotate(12.7333deg);" /&gt;&lt;img src="http://virtualdream.dev/src/assets/img/popups/bug.png" alt="Image preview" style="cursor: default; position: absolute; margin: 0px; left: 641.065px; top: 289.727px; width: 117px; height: 79px; transform: rotate(-80.6649deg);" /&gt;&lt;img src="http://virtualdream.dev/src/assets/img/popups/bug.png" alt="Image preview" style="cursor: default; position: absolute; margin: 0px; left: 243px; top: 648px; width: 495px; height: 146px;" /&gt;&lt;img src="http://virtualdream.dev/src/assets/img/smilies/yellow.gif" alt="Image preview" style="cursor: default; position: absolute; margin: 0px; left: 94px; top: 228px; width: 380px; height: 172px;" /&gt;&lt;p style="font-family: Arial; font-size: 68px; color: rgb(238, 255, 0); font-style: italic; font-weight: bolder; position: absolute; top: 24px; left: 16px; cursor: default; margin: 0px; width: 329px; height: 125px;" class=""&gt;hellllo whats up!! hello whats up!!&lt;/p&gt;&lt;img src="http://virtualdream.dev/src/assets/img/gitara.gif" alt="Image preview" style="cursor: default; position: absolute; margin: 0px; left: 635px; top: 190.16px; width: 332px; height: 645px; transform: rotate(12.7333deg);" /&gt;&lt;img src="http://virtualdream.dev/src/assets/img/smilies/yellow-recent.gif" alt="Image preview" style="cursor: default; position: absolute; margin: 0px; left: 470px; top: 117px; width: 453px; height: 82px;" /&gt;&lt;/body&gt;&lt;/html&gt;
    </textarea>
</body>
</html>