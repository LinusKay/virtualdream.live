
window.addEventListener("load", function() {
    updateHTMLOutput();
    toolChanged()
    enableTabIndent(); 
});

/**
 * Updates tool settings and cursor styles based on the selected tool.
 */
function toolChanged() {
    const selectedTool = document.getElementById("tool-select").value;
    let toolDescription;
    switch (selectedTool) {
        case "drag":
            manageToolDrag(true); 
            manageToolDelete(false); 
            manageToolCreate(false);
            manageToolScale(false);
            manageToolRotate(false);
            manageToolEdit(false);
            manageToolPageSettings(false);
            updateRenderBoxElementsCursor("grab");
            updateRenderBoxCursor("default");
            toolDescription = "This is the drag tool! Click-and-drag to move elements around the page.<br>Drag Boundary: Limits dragging to the page boundaries.<br>Clone Drag: Creates a copy of the element and drags that instead. The Ctrl key will toggle this.";
            updateToolDescription(toolDescription);
            break;
        case "edit":
            manageToolDrag(false); 
            manageToolDelete(false); 
            manageToolCreate(false);
            manageToolScale(false);
            manageToolRotate(false);
            manageToolEdit(true);
            manageToolPageSettings(false);
            updateRenderBoxElementsCursor("alias");
            updateRenderBoxCursor("default");
            toolDescription = "This is the edit tool! Click on an element to enable editing.<br>Currently supports &lt;p&gt; (text) and &lt;img&gt; (image) elements.<br>For images, enter an image location in the box, or select from the gallery below!";
            updateToolDescription(toolDescription);
            break;
        case "delete":
            manageToolDrag(false); 
            manageToolDelete(true); 
            manageToolCreate(false);
            manageToolScale(false);
            manageToolRotate(false);
            manageToolEdit(false);
            manageToolPageSettings(false);
            updateRenderBoxElementsCursor("not-allowed"); 
            updateRenderBoxCursor("default");
            toolDescription = "This is the delete tool! Click on an element to delete it.<br>Delete Confirmation: Determines whether you will be prompted before deletion or not. Careful! There is no undo around here.";
            updateToolDescription(toolDescription);
            break;
        case "create":
            manageToolDrag(false); 
            manageToolDelete(false); 
            manageToolCreate(true);
            manageToolScale(false);
            manageToolRotate(false);
            manageToolEdit(false);
            manageToolPageSettings(false);
            updateRenderBoxElementsCursor("default"); 
            updateRenderBoxCursor("default");
            toolDescription = "This is the create tool!";
            updateToolDescription(toolDescription);
            break;
        case "scale":
            manageToolDrag(false); 
            manageToolDelete(false); 
            manageToolCreate(false);
            manageToolScale(true);
            manageToolRotate(false);
            manageToolEdit(false);
            manageToolPageSettings(false);
            updateRenderBoxElementsCursor("default"); 
            updateRenderBoxCursor("default");
            toolDescription = "This is the scale tool!";
            updateToolDescription(toolDescription);
            break;
        case "rotate":
            manageToolDrag(false); 
            manageToolDelete(false); 
            manageToolCreate(false);
            manageToolScale(false);
            manageToolRotate(true);
            manageToolEdit(false);
            manageToolPageSettings(false);
            updateRenderBoxElementsCursor("grab"); 
            updateRenderBoxCursor("default");
            toolDescription = "This is the rotate tool!";
            updateToolDescription(toolDescription);
            break;
        case "pagesettings":
            manageToolDrag(false); 
            manageToolDelete(false); 
            manageToolCreate(false);
            manageToolScale(false);
            manageToolRotate(false);
            manageToolEdit(false);
            manageToolPageSettings(true);
            updateRenderBoxElementsCursor("grab"); 
            updateRenderBoxCursor("default");
            toolDescription = "This is the page settings tool!";
            updateToolDescription(toolDescription);
            break;
        default:
            manageToolDrag(false); 
            manageToolDelete(false); 
            manageToolCreate(false);
            manageToolScale(false);
            manageToolRotate(false);
            manageToolEdit(false);
            manageToolPageSettings(false);
            updateRenderBoxElementsCursor("default");
            updateRenderBoxCursor("default");
            toolDescription = "";
            updateToolDescription(toolDescription);
            break;
    }
}

/**
 * Event listener function that listens for keydown events on the document.
 * Depending on the pressed key ('c', 'e', 'd', 'r', 's', 'x'), it sets the value of
 * the tool select element and calls the toolChanged function.
 * 
 * c create
 * e edit
 * d/g drag
 * r rotate
 * s scale
 * x delete
 * 
 * @param {KeyboardEvent} event The keyboard event object.
 */
document.addEventListener('keydown', function(event) {
    if (document.activeElement.tagName === 'INPUT' || document.activeElement.tagName === 'TEXTAREA') {
        return; // Ignore key inputs if an input or textarea is selected
    }
    const selectedTool = document.getElementById("tool-select");
    switch(event.key) {
        case "c":
            selectedTool.value = "create";
            toolChanged();
            break;
        case "e":
            selectedTool.value = "edit";
            toolChanged();
            break;
        case "g":
            selectedTool.value = "drag";
            toolChanged();
            break;
        case "d":
            selectedTool.value = "drag";
            toolChanged();
            break;
        case "r":
            selectedTool.value = "rotate";
            toolChanged();
            break;
        case "s":
            selectedTool.value = "scale";
            toolChanged();
            break;
        case "x":
            selectedTool.value = "delete";
            toolChanged();
            break;
        default: break;
    }
});

/**
 * Updates the cursor style for all elements within the render box.
 * @param {string} cursor - The CSS cursor value to set on elements.
 */
function updateRenderBoxElementsCursor(cursor) {
    const htmlRenderBox = document.getElementById('creation-render');
    const htmlRenderBoxElements = htmlRenderBox.querySelectorAll('*');
    htmlRenderBoxElements.forEach(element => {
        element.style.cursor = cursor; 
    });
}


/**
 * Updates the cursor style for the render box itself.
 * @param {string} cursor - The CSS cursor value to set on the render box.
 */
function updateRenderBoxCursor(cursor) {
    const htmlRenderBox = document.getElementById('creation-render');
    htmlRenderBox.style.cursor = cursor; 
}

/**
 * Enables tab indentation in a textarea element.
 * Tab size is set to 4 spaces.
 */
function enableTabIndent() {
    tabSize = 4;
    document.getElementById('creation-input-body').addEventListener('keydown', function(e) {
    if (e.key == 'Tab') {
        e.preventDefault();
        let start = this.selectionStart;
        let end = this.selectionEnd;
        
        for(let i=0; i<tabSize; i++) {
            // set textarea value to: text before tab + tab + text after tab
            this.value = this.value.substring(0, start) + " " + this.value.substring(end);
        }
        this.selectionStart = this.selectionEnd = start + tabSize;
    }
    });
}

// Tool: Scale
/**
 * Manages the scaling tool for elements in the render box.
 * @param {boolean} enableScale - Whether to enable (true) or disable (false) the scaling tool.
 */
let shiftKeyActive = false;
function manageToolScale(enableScale) {
    const htmlRenderBox = document.getElementById("creation-render");
    const elements = htmlRenderBox.querySelectorAll("*");

    if (enableScale) {
        elements.forEach(function(element) {
            element.addEventListener('mousedown', toolScaleStartScale);
            document.addEventListener('keydown', checkShiftKey);
            document.addEventListener('keyup', checkShiftKey);
        });
    }
    else {
        elements.forEach(function(element) {
            element.removeEventListener('mousedown', toolScaleStartScale);
            document.removeEventListener('keydown', checkShiftKey);
            document.removeEventListener('keyup', checkShiftKey);
        });
    }
}

/**
 * Initiates scaling of an element on mousedown event.
 * @param {MouseEvent} event - The mousedown event object.
 */
function toolScaleStartScale(event) {
    isScaling = true;
    scaleElement = event.target;
    startWidth = scaleElement.offsetWidth;
    startHeight = scaleElement.offsetHeight;
    startX = event.clientX;
    startY = event.clientY;

    document.addEventListener('mousemove', toolScaleScale);
    document.addEventListener('mouseup', toolScaleStopScale);
}

/**
 * Scales the element based on mouse movement.
 * @param {MouseEvent} event - The mousemove event object.
 */
function toolScaleScale(event) {
    if (isScaling) {
        const deltaX = event.clientX - startX;
        const deltaY = event.clientY - startY;

        // Calculate scaling factor
        let scaleX = 1 + deltaX / startWidth;
        let scaleY = 1 + deltaY / startHeight;

        // If Shift key is pressed, scale uniformly
        if (shiftKeyActive) {
            const avgScale = (scaleX + scaleY) / 2;
            scaleX = avgScale;
            scaleY = avgScale;
        }

        scaleElement.style.width = `${startWidth * scaleX}px`;
        scaleElement.style.height = `${startHeight * scaleY}px`;
    }
}

/**
 * Stops scaling of the element on mouseup event.
 */
function toolScaleStopScale() {
    isScaling = false;
    document.removeEventListener('mousemove', toolScaleScale);
    updateHTMLInput();
}

/**
 * Checks if the Shift key is active and updates the shiftKeyActive variable accordingly.
 * Used for uniform scaling.
 * @param {KeyboardEvent} event - The keydown or keyup event object.
 */
function checkShiftKey(event) {
    shiftKeyActive = event.shiftKey;
}

// Tool: Rotate
/**
 * Manages the rotation tool for elements in the render box.
 * @param {boolean} enableRotate - Whether to enable (true) or disable (false) the rotation tool.
 */
function manageToolRotate(enableRotate) {
    const htmlRenderBox = document.getElementById("creation-render");
    const elements = htmlRenderBox.querySelectorAll("*");

    if (enableRotate) {
        elements.forEach(function(element) {
            element.addEventListener('mousedown', toolRotateStartRotate);
        });
    }
 else {
        elements.forEach(function(element) {
            element.removeEventListener('mousedown', toolRotateStartRotate);
        });
    }
}

/**
 * Initiates rotation of an element on mousedown event.
 * @param {MouseEvent} event - The mousedown event object.
 */
function toolRotateStartRotate(event) {
    event.target.style.cursor = "grabbing";
    isRotating = true;
    rotateElement = event.target;
    const boundingRect = rotateElement.getBoundingClientRect();
    const centerX = boundingRect.left + boundingRect.width / 2;
    const centerY = boundingRect.top + boundingRect.height / 2;
    const startX = event.clientX;
    const startY = event.clientY;

    startRotation = toolRotateGetRotationDegrees(rotateElement);
    startAngle = Math.atan2(startY - centerY, startX - centerX) * (180 / Math.PI);

    document.addEventListener('mousemove', toolRotateRotate);
    document.addEventListener('mouseup', toolRotateStopRotate);
}

/**
 * Rotates the element based on mouse movement.
 * @param {MouseEvent} event - The mousemove event object.
 */
function toolRotateRotate(event) {
    if (isRotating) {
        const boundingRect = rotateElement.getBoundingClientRect();
        const centerX = boundingRect.left + boundingRect.width / 2;
        const centerY = boundingRect.top + boundingRect.height / 2;
        const mouseX = event.clientX;
        const mouseY = event.clientY;

        const angle = Math.atan2(mouseY - centerY, mouseX - centerX) * (180 / Math.PI);
        const rotateAngle = startRotation + (angle - startAngle);

        rotateElement.style.transform = `rotate(${rotateAngle}deg)`;
    }
}

/**
 * Stops rotating the element on mouseup event.
 * @param {MouseEvent} event - The mouseup event object.
 */
function toolRotateStopRotate(event) {
    rotateElement.style.cursor = "grab";
    isRotating = false;
    updateHTMLInput();
    document.removeEventListener('mousemove', toolRotateRotate);
}

/**
 * Retrieves the current rotation angle of an element in degrees.
 * @param {HTMLElement} element - The element to retrieve the rotation angle from.
 * @returns {number} The current rotation angle in degrees.
 */
function toolRotateGetRotationDegrees(element) {
    const transform = window.getComputedStyle(element).getPropertyValue('transform');
    if(transform !== "none") {
        const matrix = transform.split('(')[1].split(')')[0].split(',');
        const a = matrix[0];
        const b = matrix[1];
        let angle = Math.round(Math.atan2(b, a) * (180 / Math.PI));
        if (angle < 0) angle += 360;
    }
    else angle = 0;
    return angle;
}

// Tool: Create
/**
 * Manages the visibility and behavior of the create tool based on the enableCreate flag.
 * Shows or hides the create options panel and sets initial state.
 * 
 * @param {boolean} enableCreate Flag indicating whether to enable the create tool.
 */
function manageToolCreate(enableCreate) {
    const htmlRenderBox = document.getElementById("creation-render");
    const createOptions = document.getElementById("create-options");
    if(enableCreate) {
        createOptions.style.display = "block";
        document.getElementById("create-button").innerText = "Add Element";
        toolCreateOptionTypeChanged();
    }
 else {
        createOptions.style.display = "none";
    }
}

/**
 * Inserts a new element into the render box based on the selected type (text or image).
 * If editing target is set, updates existing element; otherwise, creates a new element.
 */
function toolCreateInsertElement() {
    const htmlRenderBox = document.getElementById("creation-render");
    const elementType = document.getElementById("create-type-select").value;
    let previewElement;
    let newElement;
    if(elementType == "text") {
        previewElement = document.getElementById("text-preview");
    }
    else if(elementType === "image") {
        previewElement = document.getElementById("image-preview");
    }
    // if an editing target is set, change values for existing element
    if(editTarget) {
        newElement = previewElement.cloneNode(true);
        // ensure relevant stylings from other tools are carried over
        newElement.style.position = editTarget.style.position;
        newElement.style.top = editTarget.style.top;
        newElement.style.left = editTarget.style.left;
        newElement.style.width = editTarget.style.width;
        newElement.style.height = editTarget.style.height;
        newElement.style.transform = editTarget.style.transform;
        editTarget.parentNode.replaceChild(newElement, editTarget);
        editTarget.classList.remove("border-highlight");
        editTarget = null;
    }
    // otherwise, create a new element
    else {
        newElement = previewElement.cloneNode(true);
        newElement.removeAttribute("id");
        htmlRenderBox.appendChild(newElement)
    }
    updateHTMLInput();
    toolChanged();
}

/**
 * Handles changes in the type selection (text or image) for the create tool options.
 * Shows or hides relevant options based on the selected element type.
 */
function toolCreateOptionTypeChanged() {
    const elementType = document.getElementById("create-type-select").value;
    const textOptions = document.getElementById("create-text-options");
    const imageOptions = document.getElementById("create-image-options");

    textOptions.style.display = "none";
    imageOptions.style.display = "none";

    // Show text options if "text" element type is selected
    if (elementType === "text") {
        textOptions.style.display = "block";
        toolCreateOptionTextFontChanged();
        toolCreateOptionTextInput();
        const textSizeNumber = document.getElementById("text-size-number");
        toolCreateOptionTextSizeChanged(textSizeNumber);
        toolCreateOptionTextColourChanged();
        toolCreateOptionTextItalicChanged();
        toolCreateOptionTextBoldnessChanged();
    }
 else if (elementType === "image") {
        imageOptions.style.display = "block";
    }
}

/**
 * Updates the font family of the text preview element based on the selected font.
 */
function toolCreateOptionTextFontChanged() {
    const font = document.getElementById("font-select").value;
    const elementTextPreview = document.getElementById("text-preview");
    elementTextPreview.style.fontFamily = font;
}

/**
 * Updates the text content of the text preview element based on user input.
 */
function toolCreateOptionTextInput() {
    const textInput = document.getElementById("text-input");
    const textPreview = document.getElementById("text-preview");
    textPreview.innerText = textInput.value;
}

/**
 * Updates the font size of the text preview element based on the selected size.
 * 
 * @param {HTMLInputElement} sourceElement The input element that triggered the change.
 */
function toolCreateOptionTextSizeChanged(sourceElement) {
    const textSize = sourceElement.value;
    let textSizeNumber = document.getElementById("text-size-number");
    let textSizeRange = document.getElementById("text-size-range");
    textSizeNumber.value = textSize;
    textSizeRange.value = textSize;
    const textPreview = document.getElementById("text-preview");
    textPreview.style.fontSize = textSize + "px";
}

/**
 * Updates the text color of the text preview element based on the selected color.
 */
function toolCreateOptionTextColourChanged() {
    const textColour = document.getElementById("text-colour").value;
    const textPreview = document.getElementById("text-preview");
    textPreview.style.color = textColour;
}

/**
 * Updates the font weight (boldness) of the text preview element based on the selected boldness.
 */
function toolCreateOptionTextBoldnessChanged() {
    const textBoldness = document.getElementById("text-boldness").value;
    const textPreview = document.getElementById("text-preview");
    textPreview.style.fontWeight = textBoldness;
}

/**
 * Updates the font style (italic) of the text preview element based on the checked state.
 */
function toolCreateOptionTextItalicChanged() {
    const textItalic = document.getElementById("text-italic").checked;
    const textPreview = document.getElementById("text-preview");
    if(textItalic) textPreview.style.fontStyle = "italic";
    else textPreview.style.fontStyle = "normal";
}

/**
 * Handles the change event when an image source is given via input box.
 */
function toolCreateOptionImageSelectChanged() {
    console.log("toolCreateOptionImageSelectChanged")
    const imageSource = document.getElementById("image-select").value;
    const imagePreview = document.getElementById("image-preview");
    imagePreview.src = imageSource;
}

/**
 * Handles the selection of an image from gallery, updating the image select input and preview.
 * 
 * @param {HTMLImageElement} imageSelected The selected image element.
 */
function toolCreateOptionImageGallerySelect(imageSelected) {
    const imageSelect = document.getElementById("image-select");
    imageSelect.value = imageSelected.src;
    toolCreateOptionImageSelectChanged();
}

// Tool: Edit
/**
 * Global variable to store the currently selected element for editing.
 * @type {HTMLElement|null}
 */
let editTarget = null;

/**
 * Enables or disables the edit tool functionality.
 * @param {boolean} enableEdit - Whether to enable (true) or disable (false) edit functionality.
 */
function manageToolEdit(enableEdit) {
    const htmlRenderBox = document.getElementById("creation-render");
    const elements = htmlRenderBox.querySelectorAll("*");

    if (enableEdit) {
        elements.forEach(function(element) {
            document.getElementById("create-button").innerText = "Save Element";
            element.addEventListener('click', toolEditEdit);
        });
    }
 else {
        elements.forEach(function(element) {
            element.removeEventListener('click', toolEditEdit);
            if(editTarget != null) {
                editTarget.classList.remove("border-highlight");
                editTarget = null;
            }
        });
    }
}

/**
 * Event handler for editing an element when clicked.
 * Highlights the element and sets up editing options.
 * @param {MouseEvent} event - The click event object.
 */
function toolEditEdit(event) {
    if(editTarget != null) {
        editTarget.classList.remove("border-highlight");
        editTarget = null;
    }
    editTarget = event.target;
    editTarget.classList.add('border-highlight');

    const createOptions = document.getElementById("create-options");
    createOptions.style.display = "block";

    const elementType = editTarget.nodeName;
    const typeSelect = document.getElementById("create-type-select");
    if(elementType == "P") {
        typeSelect.value = "text";
        document.getElementById("font-select").value = editTarget.style.fontFamily || "Times New Roman";
        document.getElementById("text-size-number").value = editTarget.style.fontSize.slice(0, -2) || "16";
        document.getElementById("text-size-range").value = editTarget.style.fontSize.slice(0, -2) || "16";
        document.getElementById("text-colour").value = editTarget.style.color || "000000";
        document.getElementById("text-boldness").value = editTarget.style.fontWeight || "normal";
        document.getElementById("text-italic").checked = (editTarget.style.fontStyle === "italic") ? true : false;
        document.getElementById("text-input").value = editTarget.innerText;
    }
    else if(elementType == "IMG") {
        typeSelect.value = "image";
    }
    toolCreateOptionTypeChanged();
}

//Tool: Delete
/**
 * Enables or disables the delete tool functionality.
 * @param {boolean} enableDelete - Whether to enable (true) or disable (false) delete functionality.
 */
function manageToolDelete(enableDelete) {
    const htmlRenderBox = document.getElementById("creation-render");
    const elements = htmlRenderBox.querySelectorAll("*");
    const deleteOptions = document.getElementById("delete-options");

    if (enableDelete) {
        elements.forEach(function(element) {
            element.addEventListener('click', toolDeleteDelete);
            deleteOptions.style.display = "block";
        });
    }
 else {
        elements.forEach(function(element) {
            element.removeEventListener('click', toolDeleteDelete);
            deleteOptions.style.display = "none";
        });
    }
}
/**
 * Event handler for deleting an element when clicked.
 * Prompts for confirmation before deleting the element.
 * @param {MouseEvent} event - The click event object.
 */
function toolDeleteDelete(event) {
    const optionDeleteConfirm = document.getElementById("delete-confirm").checked;
    if(optionDeleteConfirm){
        if (confirm("Are you sure you want to delete this element?")) {
            event.target.remove();
            updateHTMLInput(); 
        }
    }
    else {
        event.target.remove();
        updateHTMLInput(); 
    }
}

//Tool: Drag
/**
 * Enables or disables the drag tool functionality.
 * @param {boolean} enableDrag - Whether to enable (true) or disable (false) drag functionality.
 */
function manageToolDrag(enableDrag) {
    const htmlRenderBox = document.getElementById("creation-render");
    const elements = htmlRenderBox.querySelectorAll('*');
    const dragOptions = document.getElementById("drag-options");

    // Global variable to track cloneDrag state
    const cloneDrag = document.getElementById("drag-clone");

    // Add event listener to track Ctrl key state
    // Allows for controlling clone drag function with keyboard
    const ctrlKeyDownHandler = function(event) {
        if (event.key === 'Control') {
            cloneDrag.checked = true;
        }
    };

    const ctrlKeyUpHandler = function(event) {
        if (event.key === 'Control') {
            cloneDrag.checked = false;
        }
    };

    if (enableDrag) {
        elements.forEach(function(element) {
            element.addEventListener('mousedown', toolDragDrag);
            dragOptions.style.display = "block";
        });

        document.addEventListener('keydown', ctrlKeyDownHandler);
        document.addEventListener('keyup', ctrlKeyUpHandler);

    }
 else {
        elements.forEach(function(element) {
            element.removeEventListener('mousedown', toolDragDrag);
            dragOptions.style.display = "none";
        });
        document.removeEventListener('keydown', ctrlKeyDownHandler);
        document.removeEventListener('keyup', ctrlKeyUpHandler);
    }
}

/**
 * Event handler for dragging an element when mousedown event is triggered.
 * @param {MouseEvent} event - The mousedown event object.
 */
function toolDragDrag(event) {
    const htmlRenderBox = document.getElementById("creation-render");
    const element = event.target;
    let isDragging = false;
    let offsetX, offsetY;
    let containerRect = htmlRenderBox.getBoundingClientRect();

    isDragging = true;
    const rect = element.getBoundingClientRect();
    offsetX = event.clientX - rect.left;
    offsetY = event.clientY - rect.top;
    element.style.position = "absolute";
    element.style.margin = "0px";
    element.style.cursor = "grabbing";

    // Clone the element if cloneDrag is true, otherwise use the original element
    const cloneDrag = document.getElementById("drag-clone").checked;
    const draggedElement = cloneDrag ? element.cloneNode(true) : element;

    // Adjust styling for the cloned element
    if (cloneDrag) {
        htmlRenderBox.appendChild(draggedElement);
    }

    document.addEventListener('mousemove', dragElement);

    /**
     * Function to handle element movement while dragging.
     * @param {MouseEvent} event - The mousemove event object.
     */
    function dragElement(event) {
        if (isDragging) {
            const newX = event.clientX - offsetX - containerRect.left;
            const newY = event.clientY - offsetY - containerRect.top;
            const optionDragBounds = document.getElementById("drag-bounds").checked;
            if(optionDragBounds) {
                const maxX = containerRect.width - element.offsetWidth;
                const maxY = containerRect.height - element.offsetHeight;

                let boundedX = Math.max(0, Math.min(newX, maxX));
                let boundedY = Math.max(0, Math.min(newY, maxY));

                element.style.left = boundedX + 'px';
                element.style.top = boundedY + 'px';
            }
            else {
                element.style.left = newX + 'px';
                element.style.top = newY + 'px';
            }
        }
    }

    document.addEventListener('mouseup', function mouseUpHandler() {
        isDragging = false;
        element.style.cursor = "grab";
        document.removeEventListener('mousemove', dragElement);
        document.removeEventListener('mouseup', mouseUpHandler);
        updateHTMLInput(); 
        toolChanged();
    });
}

// Tool: Page Settings
function manageToolPageSettings(enablePageSettings) {
    const pageSettings = document.getElementById("page-settings");
    if (enablePageSettings) {
            pageSettings.style.display = "block";
    } 
    else {
            pageSettings.style.display = "none";
    }
}

function toolPageSettingsOptionBackgroundImageSelectChanged() {
    const imageSource = document.getElementById("image-select").value;
    document.getElementById("wrapper-background").style.backgroundImage = `url('${imageSource}')`;
    updateHTMLInput();
}

function toolPageSettingsOptionBackgroundImageGallerySelect(imageSelected) {
    const imageSelect = document.getElementById("image-select");
    imageSelect.value = imageSelected.src;
    toolPageSettingsOptionBackgroundImageSelectChanged();
}

function toolPageSettingsOptionBackgroundColourChanged() {
    const backgroundColour = document.getElementById("background-colour").value;
    document.getElementById("wrapper-background").style.backgroundColor = backgroundColour;
    updateHTMLInput();
}

function toolPageSettingsOptionPageSizeChanged() {
    const pageWidth = document.getElementById("page-width").value;
    const pageHeight = document.getElementById("page-height").value;
    const htmlRenderBox = document.getElementById("creation-render");
    const backgroundWrapper = document.getElementById("wrapper-background");
    htmlRenderBox.style.width = pageWidth + "px";
    htmlRenderBox.style.height = pageHeight + "px";
    backgroundWrapper.style.width = pageWidth + "px";
    backgroundWrapper.style.height = pageHeight + "px";
    updateHTMLInput();
}

function updateToolDescription(toolDescriptionNew) { 
    const toolDescriptionElement = document.getElementById("tool-description");
    toolDescriptionElement.innerHTML = toolDescriptionNew;
}

// Update HTML input & output
/**
 * Update the render box contents based on the HTML input textarea
 */
function updateHTMLOutput() {
    const htmlInputBody = document.getElementById("creation-input-body");
    const htmlRenderBox = document.getElementById("creation-render");
    const htmlBodyInput = htmlInputBody.value;
    htmlRenderBox.innerHTML = htmlBodyInput;
    toolChanged();
}

/**
 * Update the HTML input textarea based on the render box contents
 */
function updateHTMLInput() {
    const htmlInputBody = document.getElementById("creation-input-body");
    const htmlRenderBox = document.getElementById("creation-render");
    const htmlRenderString = htmlRenderBox.innerHTML;

    const parser = new DOMParser();
    const doc = parser.parseFromString(htmlRenderString, "text/html");
    const formattedHTML = new XMLSerializer().serializeToString(doc);

    htmlInputBody.value = formattedHTML;
}