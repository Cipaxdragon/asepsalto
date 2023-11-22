<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function(){
        // Add click event listener to copy text
        $(".copy-text").click(function(){
        var textToCopy = $(this).text();

        // Create a textarea element and set its value to the text to be copied
        var textarea = document.createElement("textarea");
        textarea.value = textToCopy;

        // Append the textarea to the body
        document.body.appendChild(textarea);

        // Select the text in the textarea
        textarea.select();
        textarea.setSelectionRange(0, 99999); // For mobile devices

        // Copy the selected text to the clipboard
        document.execCommand("copy");

        // Remove the textarea from the DOM
        document.body.removeChild(textarea);

        // Provide visual feedback (optional)
        $(this).addClass("text-copied");
        setTimeout(function(){
            $(".copy-text").removeClass("text-copied");
        }, 1000);
    });
});

    </script>