    var video = document.querySelector('video');
    if (navigator.mediaDevices) 
    {
        navigator.mediaDevices.getUserMedia({video: { width: 640, height: 480 }})
        .then(function(stream) 
        {
            video.srcObject = stream;
            video.addEventListener('click', getElements);
            document.getElementById("submitcreation").hidden = false;
        })
        .catch(function(error) {
            document.querySelector('video').hidden = true;
            document.getElementById("uploadedimg").hidden = false;
            document.getElementById("loadcam").setAttribute("onclick", "");
            document.getElementById("submitcreation").hidden = false;
        });
    }

    function getElements()
    {
        var canvas = document.createElement('canvas');
        canvas.width = 640;
        canvas.height = 480;
        const ctx = canvas.getContext('2d');

        if(document.querySelector('video').hidden)
        {
            var image = document.getElementById('uploadedimg');
            ctx.drawImage(image, 0, 0,640,  480);
        }
        else
            ctx.drawImage(video, 0, 0);
        document.savemontage.url.value = canvas.toDataURL();
        document.savemontage.width.value =  640;
        document.savemontage.height.value = 480;
        var x = document.getElementById("filtres").querySelectorAll("img");
        var i;
        for (i = 0; i < x.length; i++) {
            var input = document.createElement("input");
            input.setAttribute("type", "hidden");
            input.setAttribute("name", "filtre" + (i));
            input.setAttribute("value", x[i].src);
            document.getElementById("creation").prepend(input);
        }
        // document.getElementById("submitcreation").disabled = true;
    }

    function preview(image)
    {
        if (document.querySelector('video').hidden == true && 
        (document.getElementById('uploadedimg').getAttribute("src") == '../images/system/wrongfile.png' || document.getElementById('uploadedimg').getAttribute("src") == '../images/system/nocam.png'))
        {
            alert("You need to upload image");
            return false;
        }  
        var x = document.getElementById("filtres").querySelectorAll("img");
        var already = -1;
        var i;
        for (i = 0; i < x.length; i++) {
            if (image.src === x[i].src)
                already = i;
        }
        if (already === -1)
        {
            var img = document.createElement('img');
            img.src = image.src;
            img.id = "preview";
            img.setAttribute('width', 640);
            img.setAttribute('height', 480);
            document.getElementById('filtres').append(img);
        }
        else
            x[already].remove();
        x = document.getElementById("filtres").querySelectorAll("img");
        document.getElementById("submitcreation").disabled = x.length === 0 ? true : false;

    }

    function loadFile(event) {
        var uploadedimg = document.getElementById('uploadedimg');
        uploadedimg.hidden = false;
        if (event.target.files[0].type == "image/png")
            uploadedimg.src = URL.createObjectURL(event.target.files[0]);
        else
        {
            uploadedimg.src = '../images/system/wrongfile.png';
            alert("You choose a wrong format");
        }
        document.querySelector('video').hidden = true;
        if (document.getElementById("loadcam").onClick = "")
            document.getElementById("loadcam").hidden = false;
        document.getElementById("files").value = null;
      };
    
      function loadcam()
      {
        var uploadedimg = document.getElementById('uploadedimg');
        uploadedimg.hidden = true;
        uploadedimg.removeAttribute('src');
        document.querySelector('video').hidden = false;
        document.getElementById("loadcam").hidden = true;
      }

      var wasSubmitted = false;    
      function checkBeforeSubmit(){
        if(!wasSubmitted) {
          wasSubmitted = true;
          return wasSubmitted;
        }
        return false;
      } 