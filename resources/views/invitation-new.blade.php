<script>
    if (!sessionStorage.getItem('pageReloaded')) {
        sessionStorage.setItem('pageReloaded', 'true');
        window.location.reload();
    }
    // Check if the URL ends with "/invitation"
    // if (window.location.pathname.endsWith('/invitation')) {
    //     // Reload the page
    //     window.location.reload();
    // }
</script>
<link rel="stylesheet" href="{{ url('css/fontstyle.css') }}">

<link rel="stylesheet" href="{{ url('css/style.css') }}">
<link rel="stylesheet" href="https://searchmarketingservices.online/fonts/index.css">

<script src="https://unpkg.com/fabric@5.3.0/dist/fabric.min.js"></script>
<script src="
https://cdn.jsdelivr.net/npm/sweetalert2@11.10.5/dist/sweetalert2.all.min.js
"></script>
<link href="
https://cdn.jsdelivr.net/npm/sweetalert2@11.10.5/dist/sweetalert2.min.css
" rel="stylesheet">
<style>
    
    .sidebaraddtext {
        overflow: scroll;
    }

    #logo {
        padding: none;
        margin: 0px;
    }

    .icon1 {
        font-size: 0.85em !important;
    }

    .borderPc>img {
        height: 120px;
        width: 100px;

    }

    #imgDiv {
        height: 540px;
    }

    #logo {
        padding: none;
        margin: 0px;
    }

    .footer {
        position: fixed;
        bottom: 0;
        left: 50%;
        transform: translate(-50%, 0%);
        background-color: #eee;
        margin-left: auto;
        margin-right: auto;
        text-align: center;
        margin-top: 20em;
        max-width: 30em;
        border-radius: 20px 20px 0 0;
    }

    .icon1 {
        font-size: 1em;
        padding: .5em;
        margin: .5em;
        margin-top: 0;
        transition: .5s ease-in-out;
        border-radius: 100%;
        border: 7px solid #eee;
    }

    .active1 {
        transform: scale(1.25) translateY(-1em);
        background: linear-gradient(135deg, #23f, #6589ff);
        border: 7px solid #dcdcdc;
        width: fit-content;
        height: fit-content;
        position: relative;
        padding: 50px;
        top: 10px;

        color: white;
    }

    .controls {
        display: flex;
        flex-direction: column;
    }

    button {
        background-color: #fff;
        color: #000;
        border: 1px solid #000;
        border-image: linear-gradient(to bottom, #000, #b88a00);
        border-image-slice: 1;
        padding: 4px 8px;
        cursor: pointer;
        margin-bottom: 4px;
        display: block;
        width: 100px;
        box-sizing: content-box;
    }

    button:hover {
        background-color: #000;
        color: #fff;
    }

    .color-picker-container {
        margin-bottom: 8px;
    }

    .color-picker-label {
        margin-bottom: 4px;
    }

    .color-picker {
        width: 100%;
    }

    .moveForward,
    .moveBackward {
        width: 100px;
        /* Set the same width as other buttons */
    }

    #opacityLabel,
    #opacityRange {
        width: 100%;
        margin-bottom: 8px;
    }

    /* Dropdown Styles */
    .dropdown {
        position: relative;
        display: inline-block;
    }

    .dropbtn {
        background-color: #fff;
        color: #000;
        border: 1px solid #000;
        border-image: linear-gradient(to bottom, #000, #b88a00);
        border-image-slice: 1;
        padding: 4px 8px;
        cursor: pointer;
        width: 120px;
    }

    .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f9f9f9;
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
        z-index: 1;
    }

    .dropdown-content button {
        display: block;
        width: 100%;
        text-align: left;
        padding: 8px;
        border: none;
        background: none;
        cursor: pointer;
    }

    .dropdown-content button:hover {
        background-color: #ddd;
    }

    .dropdown:hover .dropdown-content {
        display: block;
    }
</style>
<div style="
    justify-content: center;
    display: flex;
    "><button id="toolsbuttonid" class="btn btn-primary"
        onclick="showDiv()" style="
    width: 89%;
">Tools</button></div>
<div id="myDiv" style="display: none;">
    <div class="topBar" style="display:flex ;">

        <div class="mt-2">
            <img src="assets/images/image-removebg-preview.png" alt="" id="logo">
        </div>
        <div class="row justify-content-center pt-3 pb-3" style="margin-left: 10%;">
            <div class="col-auto"><a href="{{ route('card-template-list') }}" class="btn btn-primary">Back</a></div>
            <div class="col-auto"><label for="" class="btn topbtns" onclick="sidebarbackaddimg()">+ Add
                    Card</label>
            </div>
            <div class="col-auto">
                <label for="uploadImage" class="btn topbtns">+ Add Image
                    <input type="file" style="display: none;" id="uploadImage" accept="image/*">
                </label>
            </div>
            <div class="col-auto">
                <button class="btn topbtns" onclick=" showTxtTool()">+ Add Text</button>
            </div>
            <div class="col-auto"><button class="btn topbtns" id="addsticker" onclick="show()">+Add Sticker </button>
            </div>
            <div class="col-auto">
                <button class="btn pdfbtncolor" id="save" data-bs-toggle="modal"
                    data-bs-target="#exampleModaliframe">Save &
                    Preview</button>
            </div>
            <button type="button" style="width:100px" class="btn pdfbtncolor" data-bs-toggle="modal"
                data-bs-target="#exampleModal">
                Settings
            </button>
            <div class="col-auto">
                <button class="btn pdfbtncolor" id="downloadBtn3">Download PDF</button>
            </div>
            <div class="col-auto">
                <button onclick="switchToOld()" class="btn pdfbtncolor" id="switch">Switch to Old version</button>
            </div>
            <div class="col-auto">
                <button onclick="canvaClear()" class="btn pdfbtncolor">Clear Card</button>
            </div>
            <div class="col-auto">
                <button onclick="dublicateObject()" class="btn pdfbtncolor">Duplicate</button>
            </div>
        </div>

    </div>
</div>

<script>
    function showDiv() {
        var div = document.getElementById('myDiv');
        if (div.style.display === 'none') {
            div.style.display = 'block';
        } else {
            div.style.display = 'none';
        }
    }
</script>

<div id="webtoolsdiv" class="topBar" style="display:flex ;">
    <div class="mt-2">
        <img src="assets/images/image-removebg-preview.png" alt="" id="logo">
    </div>
    <div class="row justify-content-center pt-3 pb-3" style="margin-left: 10%;">
        <div class="col-auto"><a href="{{ route('card-template-list') }}" class="btn btn-primary">Back</a></div>
        <div class="col-auto"><label for="" class="btn topbtns" onclick="sidebarbackaddimg()">+ Add Card</label>
        </div>
        <div class="col-auto">
            <label for="uploadImage" class="btn topbtns">+ Add Image
                <input type="file" style="display: none;" id="uploadImage" accept="image/*">
                <input type="hidden" id="template_id" name="template_id" value="{{ $template->id }}">
            </label>
        </div>
        <div class="col-auto">
            <button class="btn topbtns" onclick=" showTxtTool()">+ Add Text</button>
        </div>
        <div class="col-auto"><button class="btn topbtns" id="addsticker" onclick="show()">+Add Sticker </button></div>
        <div class="col-auto">
            <button class="btn pdfbtncolor" id="save2" onclick="saveData()" data-bs-toggle="modal"
                data-bs-target="#exampleModaliframe">Save &
                Preview</button>
        </div>
        <button type="button" style="width:100px" class="btn pdfbtncolor" data-bs-toggle="modal"
            data-bs-target="#exampleModal">
            Settings
        </button>
        <div class="col-auto">
            <button onclick="switchToOld()" class="btn pdfbtncolor" id="switch">Switch to Old version</button>
        </div>
        <div class="col-auto">
            <button onclick="canvaClear()" class="btn pdfbtncolor">Clear Card</button>
        </div>
        <div class="col-auto">
            <button onclick="dublicateObject()" class="btn pdfbtncolor">Duplicate</button>
        </div>
    </div>

</div>

<!-- IframeModal -->
<!-- Modal -->
<div class="modal fade" height="70vh" id="exampleModaliframe" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Your Card</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center" style="height: 70vh;">
                <iframe id="iframe" height="100%" width="100%" src="" frameborder="0"></iframe>

                <p>You need to save the setting first</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- IframeModal Close -->

<!-- Save Modal -->
<input type="hidden" id="id_card">
<div class="modal fade" id="exampleModalSave" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class=" modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Save Canva</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <iframe id="iframe" src="" width="100%" height="100%" frameborder="0"></iframe>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
<!-- End Save Modal -->

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="box">
                    <form id="settingform">
                        <div class="row">

                            <div class="col-12">
                                <div class="m-5 text-center">
                                    <h3>Invitation Message title</h3>
                                    <input type="text" id="msgTitle" class="form-control">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-auto">
                                    <div class="col-lg-6 col-auto">
                                        <h5>Guest Name Font Style</h5><br>
                                    </div>
                                    <div class="col-auto mb-3">
                                        <div class="custom-select">
                                            <div class="select-wrapper">
                                                <span id="font" style="font-family:'Abramo Serif';"></span>
                                                <select id="font-selectorsetting" class="fontSelector1">
                                                    <option value="Abramo Serif" style="font-family: 'Abramo Serif';">
                                                        Abramo Serif</option>
                                                    <option value="Roboto-BlackItalic"
                                                        style="font-family: 'Roboto-BlackItalic',cursive;">
                                                        Roboto-BlackItalic</option>
                                                    <option value="DancingScript-VariableFont_wght"
                                                        style="font-family: 'DancingScript-VariableFont_wght';">
                                                        DancingScript-VariableFont_wght
                                                    </option>
                                                    <option value="FrankRuhlLibre-VariableFont_wght"
                                                        style="font-family: 'FrankRuhlLibre-VariableFont_wght';">
                                                        FrankRuhlLibre-VariableFont_wght</option>
                                                    <option value="Roboto-BlackItalic"
                                                        style="font-family: 'Roboto-BlackItalic';">
                                                        Roboto-BlackItalic</option>
                                                    <option value="RacingSansOne-Regular"
                                                        style="font-family: 'RacingSansOne-Regular';">
                                                        RacingSansOne-Regular</option>
                                                    <option value="PTSansNarrow-Regular"
                                                        style="font-family: 'PTSansNarrow-Regular';">
                                                        PTSansNarrow-Regular</option>
                                                    <option value="PTSansNarrow-Bold"
                                                        style="font-family: 'PTSansNarrow-Bold';">
                                                        PTSansNarrow-Bold</option>
                                                    <option value="Lobster-Regular"
                                                        style="font-family: 'Lobster-Regular';">
                                                        Lobster-Regular</option>
                                                    <option value="HerrVonMuellerhoff-Regular"
                                                        style="font-family: 'HerrVonMuellerhoff-Regular';">
                                                        HerrVonMuellerhoff-Regular</option>
                                                    <option value="Eleganta_PERSONAL_USE_ONLY"
                                                        style="font-family: 'Eleganta_PERSONAL_USE_ONLY';">
                                                        Eleganta_PERSONAL_USE_ONLY</option>
                                                    <option value="FrankRuhlLibre-VariableFont_wght"
                                                        style="font-family: 'FrankRuhlLibre-VariableFont_wght';">
                                                        FrankRuhlLibre-VariableFont_wght</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-auto">
                                    <h5>Guest Name Font Color</h5><br>

                                    <button class="btn btn-light mb-3"><input type="color" id="colorPickersetting"
                                            style="width: 250px; background: none;"></button>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 col-auto">
                                        <h5>envelope Inner Color</h5><br>

                                        <button class="btn btn-light mb-3"><input type="color"
                                                id="colorPickerenvelope_innersetting"
                                                style="width: 250px; background: none;"></button>
                                    </div>

                                    <div class="col-lg-6 col-auto">
                                        <h5>envelope Outer Color</h5><br>

                                        <button class="btn btn-light mb-3"><input type="color"
                                                id="colorPickerenvelope_outsetting"
                                                style="width: 250px; background: none;"></button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <b>RSVp Option</b>
                            </div>

                            <div class="col-4"><input type="checkbox" value="1" id="flexCheckChecked1"
                                    name="attending">
                                <label for="">Attending</label>
                            </div>
                            <div class="col-4"><input type="checkbox" value="1" id="flexCheckChecked2"
                                    name="gift_suggestion"><label for="">Gift Suggestion</label></div>

                            <div class="col-4"><input type="checkbox" value="1" id="flexCheckChecked3"
                                    name="reception_check"> <label for="">At the reception Check-In</label>
                            </div>
                            <div class="col-4"><input type="checkbox" value="1" id="flexCheckChecked4"
                                    name="gift_upload_photos"><label for="">Gift Upload your Photos</label>
                            </div>

                            <div class="col-4"><input type="checkbox" value="1" id="flexCheckChecked5"
                                    name="sorry_cant"> <label for="">Sorry! I Can't</label></div>
                            <div class="col-4"><input type="checkbox" value="1" id="flexCheckChecked6"
                                    name="go_website"><label for="">Go to the website</label></div>
                        </div>
                        <div class="col-12 mt-3 mb-3">
                            <b>Background</b>
                        </div>

                        <div style="text-align: center;" id="bgImgData">
                            <label class="borderPc py-2">
                                <input type="radio" onclick="backgroundSelecetor(this.value)" name="test"
                                    value="bg4.webp" id="bg4">

                                <img src="/assets/images/cardAnimation/bg4.webp" alt="Option 1">

                            </label>

                            <label class="borderPc py-2">
                                <input type="radio" onclick="backgroundSelecetor(this.value)" name="test"
                                    value="bg2.jpg" id="bg2">
                                <img src="/assets/images/cardAnimation/bg2.jpg" alt="Option 2">
                            </label>

                            <label class="borderPc py-2">
                                <input type="radio" onclick="backgroundSelecetor(this.value)" name="test"
                                    value="bg3.jpg" id="bg3">
                                <img src="/assets/images/cardAnimation/bg3.jpg" alt="Option 3">
                            </label>

                            <label class="borderPc py-2">
                                <input type="radio" onclick="backgroundSelecetor(this.value)" name="test"
                                    value="bg1.jpg" id="bg1">
                                <img src="/assets/images/cardAnimation/bg1.jpg" alt="Option 4">
                            </label>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" onclick="saveSetting()" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="footer">
    <i class="fa fa-1x icon1" style="height: fit-content;" onclick="change(this)">

        <input type="color" id="colorPicker1" onmouseover="toggleColorChange1()"
            onmouseleave="stopColorChange1()">
    </i>
    <i class="fa fa-plus fa-1x icon1" style=" height: fit-content;" onclick="change(this) , increaseText() "></i>

    <i class="fa fa-minus fa-1x  icon1" style=" height: fit-content;" onclick="change(this) , decreaseText() "></i>

    <i class="fas fa-trash  fa-1x icon1 deleteBtn1" style="height: fit-content;"
        onclick="change(this) , thisTrash() "></i>

    <i class="fas fa-copy fa-1x  icon1" style="height: fit-content;" id="clone1" onclick="change(this)"></i>

    <i class="fa fa-font fa-1x  icon1" style="height: fit-content;" onclick="change(this);showfontfamily()"></i>

</div>
<div class=" sidebar" style="display: none;z-index: 1;">
    <div class="search">
        <input type="text" id="searchInput" placeholder="Search for stickers..">
        <button id="btnSearch" class="btn btn-lg btn-secondary ">Search</button>
    </div>
    <div id="stickerList" onclick="clickONsticker()">
    </div>
</div>

<div id="sidebarbackgroundaddimg1" style="display: none;">
    <h1 class="text-center"
        style="color:purple; font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif">
        Customization the <br> Background Image
    </h1>
    <div id="txtTool" class="row  pt-3 pb-3">
        <div class="ml-5" style="margin-left:15%">
            <label for="imageInput1" class="btn topbtns">Upload
                <input class="form-control" name="Upload" type="file" id="imageInput1" accept="image/*">
            </label>
        </div>
        <button onclick="moveForward()" class="moveForward">Move Forward</button>
        <button onclick="moveBackword()" class="moveBackword">Move Backward</button>
        <div class="row" id="imgDiv"></div>
    </div>
</div>

<div id="fontfamily" style="display: none;">
    <h1 class="text-center"
        style="color:purple; font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif">
        Select the font style <br>
    </h1>
    <div id="selectfont_family" class="row  pt-3 pb-3">
        <div class="ml-5" style="margin-left:15%">
            <div class="col-auto mb-3">
                <div class="custom-select">
                    <div class="select-wrapper">
                        <span id="font" style="font-family:'Abramo Serif';"></span>
                        <select id="font-selector" class="fontSelector1">
                            <option value="Arial, sans-serif">Arial</option>
                            <option value="Arial Black, sans-serif">Arial Black</option>
                            <option value="Arial Narrow, sans-serif">Arial Narrow</option>
                            <option value="Book Antiqua, serif">Book Antiqua</option>
                            <option value="Candara, sans-serif">Candara</option>
                            <option value="Century Gothic, sans-serif">Century Gothic</option>
                            <option value="Comic Sans MS, cursive">Comic Sans MS</option>
                            <option value="Courier New, monospace">Courier New</option>
                            <option value="Franklin Gothic Medium, sans-serif">Franklin Gothic Medium</option>
                            <option value="Garamond, serif">Garamond</option>
                            <option value="Georgia, serif">Georgia</option>
                            <option value="Impact, sans-serif">Impact</option>
                            <option value="Lobster, cursive">Lobster</option>
                            <option value="Lucida Console, monospace">Lucida Console</option>
                            <option value="Lucida Sans Unicode, sans-serif">Lucida Sans Unicode</option>
                            <option value="Merriweather, serif">Merriweather</option>
                            <option value="Montserrat, sans-serif">Montserrat</option>
                            <option value="Pacifico, cursive">Pacifico</option>
                            <option value="Palatino Linotype, serif">Palatino Linotype</option>
                            <option value="Playfair Display, serif">Playfair Display</option>
                            <option value="PT Sans, sans-serif">PT Sans</option>
                            <option value="Quicksand, sans-serif">Quicksand</option>
                            <option value="Raleway, sans-serif">Raleway</option>
                            <option value="Roboto, sans-serif">Roboto</option>
                            <option value="Source Sans Pro, sans-serif">Source Sans Pro</option>
                            <option value="Tahoma, sans-serif">Tahoma</option>
                            <option value="Times New Roman, serif">Times New Roman</option>
                            <option value="Trebuchet MS, sans-serif">Trebuchet MS</option>
                            <option value="Ubuntu, sans-serif">Ubuntu</option>
                            <option value="Verdana, sans-serif">Verdana</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="sidebaraddimg" style="display: none;z-index: 2;">
    <h1 class="text-center"
        style="color:purple ;font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif">
        Customization
        the <br> Image</h1>
    <div id="txtTool" class="row  pt-3 pb-3">
        <div class="col-12">
            <h5>Image Size&nbsp;</h5>
        </div>
        <div class="col-12  btn-toolbar mb-3" role="toolbar" aria-label="Toolbar with button groups">
            <div class="btn-group me-2" role="group" aria-label="First group">
                <button type="button" class="btn btn-secondary " style="width: 95px;"
                    onclick="increaseImageSize()">+</button>
                <button type="button" class="btn btn-secondary" style="width: 95px; border-left: 2px solid black;"
                    onclick="decreaseImageSize()">-</button>
            </div>
        </div>
        <div class="col-12 mt-12">
            <h5>Image Edit &nbsp; &nbsp;</h5>
        </div>
        <div class="col-12 mt-12">
            <img src="/icon/trash-alt-svgrepo-com.svg" class="deleteBtn2" id="trash2" width="42px"
                height="42px" style="margin-top: 5px;" alt="">
            <!-- <button class="deleteBtn3">Delete</button> -->
        </div>
        <div class="color-picker-container">
            <label for="opacityRange2" class="color-picker-label">Opacity:</label>
            <input type="range" id="opacityRange2" min="0" max="100" step="10" value="100"
                class="color-picker">
        </div>

        <button onclick="moveForward()" class="moveForward">Move Forward</button>
        <button onclick="moveBackword()" class="moveBackword">Move Backward</button>
    </div>
</div>
<div class="sidebaraddtext" style="display: none;z-index: 2;">
    <h1 class="text-center" id="sidecustomizationtext"
        style="color:rgb(129, 2, 129) ;font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif">
        Customization
        the <br>Text</h1>
    <div id="txtTool" class="row  pt-3 pb-3">
        <div class="col-lg-3 col-auto">
            <h5>Font Style</h5>
        </div><br>
        <div class="col-lg-9 col-auto mb-3">
            <div class="custom-select">
                <div class="select-wrapper">
                    <span id="font" style="font-family:'Abramo Serif';"></span>
                    <select id="font-selector2" class="fontSelector1">
                        <option value="arial" style="font-family: arial">Arial</option>
                        <option value="Cinzel, serif" style="font-family: 'Cinzel', serif">Cinzel</option>
                        <option value="Sackers, sans-serif" style="font-family: 'Sackers', sans-serif">Sackers Gothic</option>
                        <option value="Rama, sans-serif" style="font-family: 'Rama', sans-serif">Rama Gothic</option>
                        <option value="CircularSpotify, sans-serif" style="font-family: 'CircularSpotify', sans-serif">CircularSpotify</option>
                        <option value="Anta, sans-serif" style="font-family: Anta;">Anta</option>
                        <option value="calig, Arial, sans-serif" style="font-family: 'calig', Arial, sans-serif;">calig
                        </option>
                        <option value="BLOODY, sans-serif" style="font-family: 'BLOODY', sans-serif;">BLOODY</option>
                        <option value="alsscrp, sans-serif" style="font-family: 'alsscrp', sans-serif;">alsscrp</option>
                        <option value="Raleway-Thin, sans-serif" style="font-family: 'Raleway-Thin', sans-serif;">Raleway Regular</option>
                        <option value="Baskervville-Regular, sans-serif" style="font-family: 'Baskervville-Regular', sans-serif;">Baskervville-Regular</option>
                        <option value="GreatVibesRegular, sans-serif" style="font-family: 'GreatVibesRegular', sans-serif;">GreatVibes Regular</option>
                        <option value="Agraham, sans-serif" style="font-family: 'Agraham', sans-serif;">Agraham</option>
                        <option value="MettaDahlia, sans-serif" style="font-family: 'MettaDahlia', sans-serif;">MettaDahlia</option>
                        <option value="Darleston" style="font-family: 'Darleston';">Darleston</option>
                        {{-- <option value="MonsieurLaDoulaise-Regular" style="font-family: 'MonsieurLaDoulaise-Regular';">MonsieurLaDoulaise-Regular</option> --}}
                        <option value="GoogleMonsieurLaDoulaiseRegular" style="font-family: 'GoogleMonsieurLaDoulaiseRegular' , sans-serif;">
                            MonsieurLaDoulaise-Regular</option>
                        <option value="DistantStroke, sans-serif" style="font-family: 'DistantStroke', sans-serif;">Distant_Stroke</option>
                        {{-- <option value="Vonique, sans-serif" style="font-family: 'Vonique', sans-serif;">Vonique 92</option> --}}
                        <option value="Vanity-Light, sans-serif" style="font-family: 'Vanity-Light', sans-serif;">Vanity-Light</option>
                        <option value="Amoun, sans-serif" style="font-family: 'Amoun', sans-serif;">Amoun</option>
                        <option value="Moon Flower, sans-serif" style="font-family: 'Moon Flower', sans-serif;">Moonflowers</option>
                        <option value="ScarlettBusiat, sans-serif" style="font-family: 'ScarlettBusiat', sans-serif;">ScarlettBusiat</option>
                        <option value="MontserratLight, sans-serif" style="font-family: 'MontserratLight', sans-serif;">Montserrat Light</option>
                        <option value="BrockScript, sans-serif" style="font-family: 'BrockScript', sans-serif;">BrockScript</option>
                        

                        <option value="jandacelebrationscript, sans-serif" style="font-family: 'jandacelebrationscript', sans-serif;">Janda Celebration Script</option>
                        <option value="anydore, sans-serif" style="font-family: 'anydore', sans-serif;">Anydore</option>
                        <option value="creattiondemo, sans-serif" style="font-family: 'creattiondemo', sans-serif;">Creattion Demo</option>
                        <option value="candy, sans-serif" style="font-family: 'candy', sans-serif;">Candy</option>
                        <option value="weddingBells, sans-serif" style="font-family: 'weddingBells', sans-serif;">Wedding bells</option>
                        <option value="Blacksword, sans-serif" style="font-family: 'Blacksword', sans-serif;">Blacksword</option>
                        <option value="GabyDemo, sans-serif" style="font-family: 'GabyDemo', sans-serif;">Gaby Demo</option>
                        <option value="arbuckle-fat, sans-serif" style="font-family: 'arbuckle-fat', sans-serif;">Arbuckle Fat</option>
                        <option value="drSugiyamaRegular, sans-serif" style="font-family: 'drSugiyamaRegular', sans-serif;">Dr Sugiyama Regular</option>
                        <option value="CasablancaNoirPersonalUse, sans-serif" style="font-family: 'CasablancaNoirPersonalUse', sans-serif;">Casablanca Noir Personal Use</option>
                        <option value="RegistaItalic, sans-serif" style="font-family: 'RegistaItalic', sans-serif;">Regista Italic</option>
                        <option value="CoalhandLueTRIAL, sans-serif" style="font-family: 'CoalhandLueTRIAL', sans-serif;">Coalhand Lue</option>
                        <option value="MagentaRose, sans-serif" style="font-family: 'MagentaRose', sans-serif;">Magenta Rose</option>
                        <option value="Vonique92_D, sans-serif" style="font-family: 'Vonique92_D', sans-serif;">Vonique92_D</option>
                        <option value="VanityBoldNarrow, sans-serif" style="font-family: 'VanityBoldNarrow', sans-serif;">VanityBoldNarrow</option>
                        <option value="KugileDemo, sans-serif" style="font-family: 'KugileDemo', sans-serif;">KugileDemo</option>
                        <option value="LovelyCoffee, sans-serif" style="font-family: 'LovelyCoffee', sans-serif;">lovely Coffe</option>
                        <option value="Atheniademo, sans-serif" style="font-family: 'Atheniademo', sans-serif;">Atheniademo</option>a
                       
                        
                        <option value="Evilof, sans-serif" style="font-family: 'Evilof', sans-serif;">Evilof</option>
                        <option value="Landliebe, sans-serif" style="font-family: 'Landliebe', sans-serif;">Landliebe
                        </option>
                        <option value="GREENFUZ, sans-serif" style="font-family: 'GREENFUZ', sans-serif;">GREENFUZ
                        </option>
                        <option value="Headhunter-Regular, sans-serif"
                            style="font-family: 'Headhunter-Regular', sans-serif;">Headhunter Regular</option>
                        <option value="victoria, sans-serif" style="font-family: 'victoria', sans-serif;">victoria
                        </option>
                        <option value="Rock Salt, cursive" style="font-family: 'Rock Salt', cursive;">Rock Salt</option>
                        <option value="playball, cursive" style="font-family: 'Playball', cursive;">Playball</option>
                        <option value="Rammetto One, sans-serif" style="font-family: 'Rammetto One', sans-serif;">
                            Playball</option>
                        <option value="Bungee Shade, sans-serif" style="font-family: 'Bungee Shade', sans-serif;">Bungee
                            Shade</option>
                        <option value="HenryMorganHand, sans-serif" style="font-family: 'HenryMorganHand', sans-serif;">
                            Henry MorganHand</option>
                        <option value="romeo, sans-serif" style="font-family: 'romeo', sans-serif;">Romeo</option>
                        <option value="XTRAFLEX, sans-serif" style="font-family: 'XTRAFLEX', sans-serif;">XTRAFLEX
                        </option>
                        <option value="DancingScript-Regular, sans-serif"
                            style="font-family: 'DancingScript-Regular', sans-serif;">DancingScript Regular</option>
                        <option value="MountainsofChristmas, sans-serif"
                            style="font-family: 'MountainsofChristmas', sans-serif;">Mountains of Christmas</option>
                        <option value="Kingthings_Foundation, sans-serif"
                            style="font-family: 'Kingthings_Foundation', sans-serif;">Kingthings_Foundation</option>
                        <option value="Royalacid_o, sans-serif" style="font-family: 'Royalacid_o', sans-serif;">
                            Royalacid_o</option>
                        <option value="Royalacid, sans-serif" style="font-family: 'Royalacid', sans-serif;">Royalacid
                        </option>
                        <option value="OrotundCaps, sans-serif" style="font-family: 'OrotundCaps', sans-serif;">
                            OrotundCaps</option>
                        <option value="qurve, sans-serif" style="font-family: 'qurve', sans-serif;">qurve</option>
                        <option value="dephun2, sans-serif" style="font-family: 'dephun2', sans-serif;">dephun2</option>
                        <option value="mysteron, sans-serif" style="font-family: 'mysteron', sans-serif;">mysteron
                        </option>
                        <option value="LETSEAT, sans-serif" style="font-family: 'LETSEAT', sans-serif;">LETSEAT</option>
                        <option value="energydimension, sans-serif" style="font-family: 'energydimension', sans-serif;">
                            Energy Dimension</option>
                        <!-- <option value="Popups, sans-serif" style="font-family: 'Popups', sans-serif;">Popups</option> -->
                        <option value="dipedthick, sans-serif" style="font-family: 'dipedthick', sans-serif;">dipedthick
                        </option>

                        <option value="EB Garamond, serif" style="font-family: EB Garamond, serif">EB Garamond</option>
                        <option value="Courier New, monospace" style="font-family: Courier New, monospace">Courier New
                        </option>
                        <option value="Lobster, sans-serif" style="font-family: Lobster;">Lobster</option>
                        <option value="Lucida Console, monospace" style="font-family: Lucida Console, monospace">Lucida
                            Console</option>
                        <option value="Montserrat, sans-serif" style="font-family: Montserrat, sans-serif">Montserrat
                        </option>
                        <option value="Pacifico, cursive" style="font-family: Pacifico, cursive">Pacifico</option>
                        <option value="PT Sans, sans-serif" style="font-family: PT Sans, sans-serif">PT Sans</option>
                        <option value="Quicksand, sans-serif" style="font-family: Quicksand, sans-serif">Quicksand
                        </option>
                        <option value="Roboto, sans-serif" style="font-family: Roboto, sans-serif">Roboto</option>
                        <option value="Source Code Pro, monospace" style="font-family: Source Code Pro, monospace">
                            Source Code Pro</option>
                        <option value="Ubuntu, sans-serif" style="font-family: Ubuntu, sans-serif">Ubuntu</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="dropdown">
            <button id="textEffectsBtn" class="dropbtn">Text Effects</button>
            <div class="dropdown-content">
                <button onclick="boldBtn()">Bold</button>
                <button onclick="italicBtn()">Italic</button>

                <button onclick="shadowBtn()">Shadow</button>
                <button onclick="letterSpacingBtn()">Letter Spacing</button>
                <button onclick="lineHeightBtn()">Line Height</button>
                <button onclick="borderBtn()">Border</button>
                <button onclick="textAlignmentBtn()">Text Alignment</button>
                <button onclick="textRotationBtn()">Text Rotation</button>

                <button onclick="textFlipBtn()">Text Flip</button>
                <button onclick="textTransformBtn()">Text Transform</button>
                <button onclick="textOpacityBtn()">Text Opacity</button>

            </div>
        </div>

        <div class="col-lg-3 col-auto ">
            <label for="canvasColor" class="color-picker-label">Background Color:</label>
        </div>
        <div class="col-lg-9 col-sm-3 ">
            <input style="width: 100%;" type="color" id="canvasColor" class="color-picker" value="#ffffff"
                oninput="chnageBGColor()">
        </div>

        <div class="col-lg-3 col-auto ">
            <label for="textColor" class="color-picker-label">Text: </label>
        </div>
        <div class="col-lg-9 col-auto ">
            <input type="text" style="width: 100%;" id="textInput" placeholder="Enter text">
        </div>

    </div>
    <div class="col-lg-12 col-auto ">
        <button style="width: 100%;" onclick="addText()" class="btn btn-secondary">addText</button>
    </div>
    <div class="col-lg-3 col-auto">
        <h5>Font Size&nbsp;</h5>
    </div>
    <div class="col-lg-9 col-auto  btn-toolbar mb-3" role="toolbar" aria-label="Toolbar with button groups">
        <div class="btn-group me-2" role="group" aria-label="First group">
            <button type="button" class="btn btn-secondary " id="buttonplus" style="width: 95px;"
                onclick="increaseText()">+</button>
            <button type="button" class="btn btn-secondary" id="buttonminus"
                style="width: 95px; border-left: 2px solid black;" onclick="decreaseText()">-</button>
        </div>
    </div>
    <div class="col-lg-3 col-auto">
        <h5>Font Color</h5>
    </div>
    <div class="col-lg-9 col-auto">
        <input type="color" id="colorPicker" oninput="changeTextColor2()">

    </div>
    <button id="deleteBtn">Delete</button>
    <button id="undoBtn">Undo</button>
    <button id="redoBtn">Redo</button>
    <button onclick="moveForward()" class="moveForward">Move Forward</button>
    <button onclick="moveBackword()" class="moveBackword">Move Backward</button>

    <input type="file" id="uploadImage2" accept="image/*">

    <div class="color-picker-container">
        <label for="opacityRange" class="color-picker-label">Opacity:</label>
        <input type="range" id="opacityRange" min="0" max="100" step="10" value="100"
            class="color-picker">
    </div>

    <div class="col-auto mt-4">
        <h5>Font Edit &nbsp; &nbsp;</h5>
    </div>
    <div class="col-auto mt-2">
        <img src="/icon/align-left-svgrepo-com.svg" id="textalign-left" class="align-option1" width="36px"
            height="46px" style="margin-top: 5px;margin-right: 10px;" alt="">
        <img src="/icon/align-center-svgrepo-com (1).svg" id="textalign" width="32px" height="42px"
            style="margin-top: 5px;margin-right: 10px;" alt="">
        <img src="/icon/align-right-svgrepo-com.svg" id="textalign-right" class="align-option2" width="32px"
            height="42px" style="margin-top: 5px;margin-right: 10px;" alt="">
        <img src="/icon/trash-alt-svgrepo-com.svg" id="trash" onclick="deleteSelected()" class="deleteBtn"
            width="42px" height="42px" style="margin-top: 5px;" alt="">
        <img src="/icon/copy-svgrepo-com.svg" id="clone" width="42px" height="42px" style="margin-top: 5px;"
            alt="">
    </div>
</div>
</div>

<div style="z-index:0;" class="myCardView" id="canv">
    <canvas id="canvas">Your browser doesn't support canvas</canvas>
</div>

<script>
    var fontselectorsetting = document.getElementById("font-selectorsetting");
    var colorPickersetting = document.getElementById("colorPickersetting");
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/fabric.js/4.5.0/fabric.min.js"></script>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

<script src="https://cdnjs.cloudflare.com/ajax/libs/fabric.js/5.3.1/fabric.min.js"
    integrity="sha512-CeIsOAsgJnmevfCi2C7Zsyy6bQKi43utIjdA87Q0ZY84oDqnI0uwfM9+bKiIkI75lUeI00WG/+uJzOmuHlesMA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
    integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="{{ url('js/invitation.js') }}"></script>