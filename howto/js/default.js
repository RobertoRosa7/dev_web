class Default {
    constructor(){
        this.idLoad();
        this.elementPrototype();
        this.customSelect();
        //this.btnToCopy();
        //this.formModal();
        //this.menuSlide();
        //this.initComparison();
        //this.imageGlassZoom(this.el.myImage, 3);
        //this.zoomImagePreview(this.el.myImage, this.el.myResult);
        //this.index = 1;
        //this.imageTabs();
        //this.imageGrid();
        //this.slideModalGallery(this.index);
        //this.modalImage();
        //this.slideGallery(this.index);
        //this.slideShow(this.index); // manual
        //this.slideShowAuto(); // automatic
    }
    // load all id's
    idLoad(){
        this.el = {};
        document.querySelectorAll('[id]').forEach(element =>{
            this.el[this.camelCase(element.id)] = element;
        });
    }
    // convert id toCamelCase
    camelCase(text){
        let div = document.createElement('div');
        div.innerHTML = `<div data-${text}="id"></div>`;
        return Object.keys(div.firstChild.dataset)[0];
    }
    // prototype
    elementPrototype(){
        // add listen
        Element.prototype.on = function(events, fn){
           events.split(' ').forEach(event =>{
               this.addEventListener(event, fn);
               return this;
           });
        }
        // toggle class
        Element.prototype.toggleClass = function(name){
            this.classList.toggle(name);
            return this;
        }
        // remove class
        Element.prototype.removeClass = function(name){
            this.classList.remove(name);
            return this;
        }
        // add class
        Element.prototype.addClass = function(name){
            this.classList.add(name);
            return this;
        }
        // hide
        Element.prototype.hide = function(){
            this.style.display = 'none';
            return this;
        }
        // has class
        Element.prototype.hasClass = function(name){
            this.classList.contains(name);
        }
        // empty class
        Element.prototype.emptyClass = function(name){
            this.className = this.className.replace(name, '');
            return this;
        }
        // show
        Element.prototype.show = function(){
            this.style.display = 'block';
            return this;
        }
        // show inline
        Element.prototype.showInline = function(){
            this.style.display = 'inline-block';
        }
        // css
        Element.prototype.css = function(styles){
            for(let name in styles){
                this.style[name] = styles[name];
            }
            return this;
        }
    }
    customSelect(){
      let x, i, j, elmnt, a, b, c;
      x = document.getElementsByClassName('custom-select');
      for(i = 0; i < x.length; i++){
        elmnt = x[i].getElementsByTagName('select')[0];
        a = document.createElement('div');
        a.setAttribute('class', 'select-selected');
        a.innerHTML = elmnt.options[elmnt.selectedIndex].innerHTML;
        x[i].appendChild(a);
        b = document.createElement('div');
        b.setAttribute('class', 'select-items select-hide');
        for(j = 1; j < elmnt.length; j++){
            c = document.createElement('div');
            c.innerHTML = elmnt.options[j].innerHTML;
            c.on('click', e =>{
                let y, i, k, s, h;
                s = e.target.parenNode.parenNode.getElementsByTagName('select')[0];
                h = e.target.parentNode.previousSibling;
                for(i = 0; i < s.length; i++){
                    if(s.options[i].innerHTML == e.target.innerHTML){
                        s.selectedIndex = i;
                        h.innerHTML = e.target.innerHTML;
                        y = e.target.parentNode.getElementsByClassName('same-as-selected');
                        for(k = 0; k < y.length; k++){
                            y[k].removeAttribute('class');
                        }
                        e.target.setAttribute('class', 'same-as-selected');
                        break;
                    }
                }
                h.click();
            });
            b.appendChild(c);
        }
        x[i].appendChild(b);
        a.on('click', e =>{
            e.stopPropagation();
            this.closeAllSelect(e.target);
            e.target.nextSibling.toggleClass('select-hide');
            e.target.toggleClass('select-arrow-active');
        });
      }
    }
    closeAllSelect(elmnt){
        let x, y, i, arrNo = [];
        x = document.getElementsByClassName('select-items');
        y = document.getElementsByClassName('select-selected');
        for(i = 0; i < y.length; i++){
            if(elmnt == y[i]){
                arrNo.push(i);
            }else{
                y[i].removeClass('select-arrow-active');
            }
        }
        for(i = 0; i < x.length; i++){
            if(arrNo.indexOf(i)){
                x[i].addClass('select-hide');
            }
        }
        document.addEventListener('click', this.closeAllSelect);
    }
    btnToCopy(){
        this.el.btnToCopy.on('click', e =>{
            // get text inside input
            this.el.inputTextCopy.select();
            // copy text inside the input
            document.execCommand('copy');
            alert(`texto copiado: ${this.el.inputTextCopy.value}`);
        });
    }
    formModal(){
        this.el.btnLogin.on('click', e =>{
            this.el.formModal.show();
        });
        this.el.btnCloseFormModal.on('click', e =>{
            this.el.formModal.hide();
        });
    }
    // btn to top
    btnToTop(){
        if(document.body.scrollTop > 20 || document.documentElement.scrollTop > 20){
            this.el.btnToTop.show();
            this.el.btnToTop.on('click',e =>{
                document.body.scrollTop = 0;
                document.documentElement.scrollTop = 0;
            });
        }else{
            this.el.btnToTop.hide();
        }
    }
    // initialize comparison
    initComparison(){
        let x = document.querySelectorAll('.img-comp-overlay');
        x.forEach(e =>{
            this.imageCompare(e);
        });
    }
    imageCompare(img){
        let slider, clicked = 0, w, h;
        // get width and height of the img element
        w = img.offsetWidth;
        h = img.offsetHeight;
        //console.log(w,h);
        // set width of the element to 50%;
        img.style.width = `${(w/2)}px`;
        // create slider
        slider = document.createElement('div');
        slider.setAttribute('class', 'img-comp-slider');
        img.parentElement.insertBefore(slider, img);
        // position slider at the middle
        slider.style.top = `${(h/2) - (slider.offsetHeight/2)}px`;
        slider.style.left = `${(w/2) - (slider.offsetWidth/2)}px`;
        // execute
        slider.on('mousedown',slideReady);
        window.addEventListener('mouseup',slideFinish);
        slider.on('touchstart',slideReady);
        window.addEventListener('touchstop',slideFinish);
        
        function slideReady(e){
            e.preventDefault();
            // slide now is clicked and ready to move
            clicked = 1;
            // execute function to move
            window.addEventListener('mousemove', slideMove);
            window.addEventListener('touchmove', slideMove);
        }
        function slideFinish(e){
            // slide no more clicked
            clicked = 0;
        }
        function slideMove(e){
            let pos;
            // if slide is no longer clicked exit the function
            if(clicked === 0) return false;
            // get cursor position
            pos = getCursor(e);
            // prevent slide outside position of the image
            if(pos < 0) pos = 0;
            if(pos > w) pos = w;
            // execute function that will resize the overlay image according to the cursor
            slide(pos);
            function getCursor(e){
                let a, x = 0;
                e = e || window.event;
                a = img.getBoundingClientRect();
                x = e.pageX - a.left;
                x = x - window.pageXOffset;
                return x;
            }
            function slide(x){
                //resize the image
                img.style.width = `${x}px`;
                // position slider
                slider.style.left = `${img.offsetWidth - (slider.offsetWidth/2)}px`;
            }
        }
    }

    // image glass zoom
    imageGlassZoom(image, zoom){
        let glass, w, h, bw;
        // create magnified glass
        glass = document.createElement('div');
        glass.setAttribute('class', 'img-magnifier-glass');
        // insert glass inside div
        image.parentElement.insertBefore(glass, image);
        // set background property for the magnifier glass
        glass.style.backgroundImage = `url(${image.src})`;
        glass.style.backgroundRepeat = 'no-repeat';
        glass.style.backgroundSize = `${(image.width * zoom)}px${(image.height * zoom)}px`;
        bw = 3;
        w = glass.offsetWidth / 2;
        h = glass.offsetHeight /2;
        // execute the method when mouseover
        glass.on('mouseover',moveMagnifier);
        image.on('mouseover',moveMagnifier);
        // touch screen
        glass.on('mouseover',moveMagnifier);
        image.on('mouseover',moveMagnifier);
        function moveMagnifier(e){
            let pos, x, y;
            // prevent other action
            e.preventDefault();
            // get cursor position x and y
            pos = getCursor(e);
            x = pos.x;
            y = pos.y;
            // prevent position outside image
            if(x > image.width - (w / zoom)) {x = image.width - (w / zoom);}
            if(x < w / zoom){x = w / zoom;}
            if(y > image.height - (h / zoom)) {y = image.height - (h / zoom);}
            if(y < h / zoom) {y = h / zoom;}
            // set position glass
            glass.style.left = `${(x - w)}px`;
            glass.style.top = `${(y - h)}px`;
            // display on screen
            glass.style.backgroundPosition = `-${((x * zoom)-w+bw)}px -${((y * zoom)-h+bw)}px`;
            function getCursor(e){
                let a, x = 0, y = 0;
                e = e || window.event;
                // get position x and y of the image
                a = image.getBoundingClientRect();
                // calculate coordinate of the image
                x = e.pageX - a.left;
                y = e.pageY - a.top;
                // considering any page scrolling
                x = x - window.pageXOffset;
                y = y - window.pageYOffset;
                // return object
                return {x:x, y:y};
            }
        }
    }
    // zoom image preview
    zoomImagePreview(image, preview){
        let lens, cx, cy;
        // create lens
        lens = document.createElement('div');
        lens.setAttribute('class', 'img-zoom-lens');
        // insert lens
        image.parentElement.insertBefore(lens, image);
        //calculate ratio between result div and lens
        cx = preview.offsetWidth / lens.offsetWidth;
        cy = preview.offsetHeight / lens.offsetHeight;
        // set background property for the result div
        preview.style.backgroundImage = `url(${image.src})`;
        preview.style.backgroundSize = `${(image.width * cx)}px${(image.height * cy)}px`;
        // execute a method when move cursor over image
        lens.on('mouseover', movelens);
        image.on('mouseover', movelens);
        lens.on('touchmove', movelens);
        image.on('touchmove', movelens);
        function movelens(e){
            let pos, x, y;
            // prevent any other action over image
            e.preventDefault();
            // get position x and y from cursor
            pos = getCursor(e);
            //calculate position of the lens
            x = pos.x - (lens.offsetWidth / 2);
            y = pos.y - (lens.offsetHeight / 2);
            // prevent the lens from being positioned outside the image
            if(x > image.width - lens.offsetWidth) {x = image.width - lens.offsetWidth;}
            if(x < 0){x = 0;}
            if(y > image.height - lens.offsetHeight) {y = image.height - lens.offsetHeight;}
            if(y < 0){y = 0;}
            // set position lens
            lens.style.left = `${x}px`;
            lens.style.top = `${y}px`;
            // display what lens see
            preview.style.backgroundPosition = `-${(x * cx)}px -${(y *cy)}px`;
            //get cursor position
            function getCursor(e){
                let a, x = 0, y = 0;
                e = e || window.event;
                // get x and y position of the image
                a = image.getBoundingClientRect();
                // calculate coordinate relative to the image
                x = e.pageX - a.left;
                y = e.pageY - a.top;
                // considering any page scrolling
                x = x - window.pageXOffset;
                y = y - window.pageYOffset;
                return {x:x, y:y};
            }
        }
    }
    // image tabs
    imageTabs(){
        this.el.imgTie.on('click', e =>{
            this.el.expandedImg.src = this.el.imgTie.src;
            this.el.imgtext.innerHTML = this.el.imgTie.alt;
            this.el.expandedImg.parentElement.show();
        });
        this.el.imgLamp.on('click', e =>{
            this.el.expandedImg.src = this.el.imgLamp.src;
            this.el.imgtext.innerHTML = this.el.imgLamp.alt;
            this.el.expandedImg.parentElement.show();
        });
        this.el.imgIspirion.on('click', e =>{
            this.el.expandedImg.src = this.el.imgIspirion.src;
            this.el.imgtext.innerHTML = this.el.imgIspirion.alt;
            this.el.expandedImg.parentElement.show();
        });

        this.el.imgClose.on('click', e =>{
            this.el.expandedImg.parentElement.hide();
        });
    }
    // image grid
    imageGrid(){
        let elements = document.querySelectorAll('.column');
        this.el.col1.on('click', e =>{
            elements.forEach(el =>{
                el.style.flex = '98%';
            });
        });
        this.el.col2.on('click', e =>{
            elements.forEach(el =>{
                el.style.flex = '48%';
            });
        });
        this.el.col3.on('click', e =>{
            elements.forEach(el =>{
                el.style.flex = '30%';
            });
        });
        this.el.col4.on('click', e =>{
            elements.forEach(el =>{
                el.style.flex = '24%';
            });
        });
        this.el.col5.on('click', e =>{
            elements.forEach(el =>{
                el.style.flex = '12%';
            });
        });
    }
    // open modal lightbox
    openModal(){
        //this.el.myModal.show();
    }
    closeModal(){
       // this.el.myModal.hide();
    }
    // modal image
    modalImage(){
        this.el.myImg.on('click', e =>{
            this.el.myModal.show();
            this.el.img2.src = this.el.myImg.src;
            this.el.caption.innerHTML = this.el.myImg.alt
        });
        this.el.closeModal.on('click', e =>{
            this.el.myModal.hide();
        });
    }
    // slide gallery
    slideGallery(n){
        let slides = document.querySelectorAll('.my-slide');
        let dots = document.querySelectorAll('.demo');
        if(n > slides.length) {this.index = 1;}
        if(n < 1) {this.index = slides.length;}
        slides.forEach(el =>{
            el.hide();
        });
        dots.forEach(dt =>{
            dt.emptyClass('active');
        });
        slides[this.index -1].show();
        dots[this.index -1].addClass('active');
        this.el.caption.innerHTML = dots[this.index -1].alt;
    }
    // slide show auto
    slideShowAuto(){
        this.index = 0;
        let slides = document.querySelectorAll('.my-slide');
        let dots = document.querySelectorAll('.dot');
        slides[0].show();
        dots[0].addClass('active');
        setInterval(()=>{
            this.index++;
            slides.forEach(sl =>{
                sl.hide();
            });
            dots.forEach(dt =>{
                dt.emptyClass('active');
            });
            if(this.index > slides.length){this.index = 1;}
            slides[this.index -1].show();
            dots[this.index -1].addClass('active');
        },3000);
    }
    // slide modal gallery
    slideModalGallery(n){
        let slides = document.querySelectorAll('.my-slides');
        let dots = document.querySelectorAll('.demo');
        let text = document.querySelector('#caption');
        if(n > slides.length){this.index = 1;}
        if(n < 1){this.index = slides.length;}
        slides.forEach(sl =>{
            sl.hide();
        });
        dots.forEach(dt =>{
            dt.emptyClass('active');
        });
        slides[this.index -1].show();
        dots[this.index -1].addClass('active');
        text.innerHTML = dots[this.index -1].alt;
    }
    // push slide slide manul
    pushSlide(n){
        //this.slideShow(this.index += n);
        //this.slideGallery(this.index += n);
        //this.slideModalGallery(this.index += n);
    }
    // current slide slide manul
    currentSlide(n){
        //this.slideShow(this.index = n);
        //this.slideGallery(this.index = n);
        //this.slideModalGallery(this.index = n);
    }
    // slide show manual
    slideShow(n){
        let slides = document.querySelectorAll('.my-slide');
        let dots = document.querySelectorAll('.dot');
        if(n > slides.length) {this.index = 1;}

        if(n < 1) {this.index = slides.length;}
        slides.forEach(el =>{
            el.hide();
        });
        dots.forEach(dt =>{
            dt.emptyClass('active');
        });
        slides[this.index -1].show();
        dots[this.index -1].addClass('active');
    }
    // active responsive
    activeResponsive(responsive){
        this.el.btnIconResponsive.on('click', e =>{
            e.preventDefault();
            if(this.el.sbdResponsive.className == responsive){
                this.el.sbdResponsive.addClass('responsive');
            }else{
                this.el.sbdResponsive.removeClass('responsive');
            }
        });
    }
    // sidebar dropdown
    sidebarDropdown(){
        let drop = document.querySelectorAll('.dropdown-btn');
        drop.forEach(e =>{
            e.on('click', f =>{
                f.target.toggleClass('active');
                let dropContent = f.target.nextElementSibling;
                if(dropContent.style.display == 'block'){
                    dropContent.hide();
                }else{
                    dropContent.show();
                }
            });
        });
    }
    btnDropdown(){
        this.el.btnLeftDropdown.on('click', e =>{
            e.preventDefault();
            e.stopPropagation();
            this.el.containerDropdown1.toggleClass('show-dropdown');
            this.windowClick();

        });
        this.el.btnRightDropdown.on('click', e =>{
            e.preventDefault();
            e.stopPropagation();
            this.el.containerDropdown2.toggleClass('show-dropdown');
            this.windowClick();
        });
    }
    // click document hide window focus
    btnClose(e){
        document.removeEventListener('click', this.btnClose);
        this.el.containerDropdown1.removeClass('show-dropdown');
    }
    // window click close current window focu
    windowClick(){
        window.onclick = e =>{
            if(!e.target.matches('btn-dropdown')){
                let drops = document.querySelectorAll('.dropdown-content');
                drops.forEach(i =>{
                    if(i.classList.contains('show-dropdown')){
                        i.classList.remove('show-dropdown');
                    }
                });
            }
        }
    }
    // menu slide down
    menuSlide(){window.onscroll = () =>{ this.btnToTop(); }}
    // menu shrink on scroll
    menuShrinkOnScroll(){
        if(document.body.scrollTop > 80 || document.documentElement.scrollTop > 80){
            this.el.menuShrinkScroll.style.padding = '25px 10px';
            this.el.logo.style.fontSize = '25px';
        }else{
            this.el.menuShrinkScroll.style.padding = '80px 10px';
            this.el.logo.style.fontSize = '36px';
        }
    }
    // scroll down
    scrollDown(){
        if(document.body.scrollTop > 20 || document.documentElement.scrollTop > 20){
            this.el.menuSlideScroll.style.top = '0';
        }else{
            this.el.menuSlideScroll.style.top = '-50px';
        }
    }
    // menu hide on scroll
    menuHideOnScroll(){
        let prevScrollpos = window.pageYOffset;
        if(prevScrollpos == 0){
            this.el.menuHideScroll.style.top = '0';
        }else{
            this.el.menuHideScroll.style.top = '-50px';
        }
    }
    // btn responsive
    btnResponsive(){
        this.el.sbBtnIcon.on('click', e =>{
            e.preventDefault();

            if(this.el.sbBtnResponsive.className == 'sb-btn-responsive'){
                this.el.sbBtnResponsive.className += ' responsive';
            }else{
                this.el.sbBtnResponsive.className = 'sb-btn-responsive';
            }
        });
    }
    // full screen navigation slide fall back
    fsnSlideFallback(){
        this.el.fsnOpen.on('click', e =>{
            this.el.fsnOverlay.style.height = '100%';
        });
        this.el.btnFsnClose.on('click', e =>{
            this.el.fsnOverlay.style.height = '0';
        });   
    }
    // full screen navigation slide left
    fsnSlide(){
        this.el.fsnOpen.on('click', e =>{
            this.el.fsnOverlay.style.width = '100%';
        });
        this.el.btnFsnClose.on('click', e =>{
            this.el.fsnOverlay.style.width = '0';
        });
    }
    // sidebar overlay
    sidebarOverlay(){
        this.el.sbOpen.on('click', e =>{
            this.el.sbNavigation.style.width = '250px';
        });
        this.el.btnSbClose.on('click', e =>{
            e.preventDefault();
            this.el.sbNavigation.style.width = '0';
        });
    }
    // sidebar off canvas
    sidebarOffCanvas(){
        this.el.sbOpen.on('click', e =>{
            this.el.sbNavigation.style.width = '250px';
            this.el.sbMain.style.marginLeft = '250px';
        });
        this.el.btnSbClose.on('click', e =>{
            e.preventDefault();
            this.el.sbNavigation.style.width = '0';
            this.el.sbMain.style.marginLeft = '0';
        });
    }
    // sidebar opacity
    sidebarOpacity(){
        this.el.sbOpen.on('click', e =>{
            this.el.sbNavigation.style.width = '250px';
            this.el.sbMain.style.marginLeft = '250px';
            document.body.style.transition ='.4s';
            document.body.style.backgroundColor = "rgba(0,0,0,0.3)";
        });
        this.el.btnSbClose.on('click', e =>{
            e.preventDefault();
            this.el.sbNavigation.style.width = '0';
            this.el.sbMain.style.marginLeft = '0';
            document.body.style.transition ='.4s';
            document.body.style.backgroundColor = "white";
        });
    }
    // menu search
    menuSearch(){
        // declare vaiables
        let filter = [];
        this.el.msInputSearch.on('keyup', e =>{
            if(e.target.value == ''){
                this.el.msListItem.hide();
            }else{
                this.el.msListItem.show();
            }
            let ul = this.el.msListItem.children;
            [...ul].forEach(link =>{
                filter = link.children[0].innerHTML;
                if(filter.indexOf(e.target.value) > -1){
                    link.style.display = '';
                }else{
                    link.style.display = 'none';
                }
            });
        });
    }
    // top navigation
    topNavigation(){
        this.el.topnavIconToggle.on('click', e =>{
            e.preventDefault();
            let x = this.el.myTopNav;
            if(x.className == 'topnav'){
                x.classList.add('responsive');
            }else{
                x.className = 'topnav';
            }
        });
    }
    // toggle tabs hover
    toggleTabsHover(){
        this.el.toggleTabHoverParis.hide();
        this.el.toggleTabHoverTokyo.hide();
        this.el.toggleTabHoverOslo.hide();
        this.el.toggleTabHoverLondom.show();
        this.el.btnTabHoverLondom.on('mouseover', e =>{
            this.el.toggleTabHoverParis.hide();
            this.el.toggleTabHoverTokyo.hide();
            this.el.toggleTabHoverOslo.hide();
            this.el.toggleTabHoverLondom.show();
        });
        this.el.btnTabHoverParis.on('mouseover', e =>{
            this.el.toggleTabHoverLondom.hide();
            this.el.toggleTabHoverTokyo.hide();
            this.el.toggleTabHoverOslo.hide();
            this.el.toggleTabHoverParis.show();
        });
        this.el.btnTabHoverTokyo.on('mouseover', e =>{
            this.el.toggleTabHoverLondom.hide();
            this.el.toggleTabHoverParis.hide();
            this.el.toggleTabHoverOslo.hide();
            this.el.toggleTabHoverTokyo.show();
        });
        this.el.btnTabHoverOslo.on('mouseover', e =>{
            this.el.toggleTabHoverLondom.hide();
            this.el.toggleTabHoverParis.hide();
            this.el.toggleTabHoverTokyo.hide();
            this.el.toggleTabHoverOslo.show();
        });
    }
    // toggle tabs page
    toggleTabsPage(){
        this.el.btnTabPageLondom.on('click', e =>{
            this.el.toggleTabPageParis.hide();
            this.el.toggleTabPageTokyo.hide();
            this.el.toggleTabPageOslo.hide();
            this.el.toggleTabPageLondom.show();
            this.el.btnTabPageParis.removeClass('blue');
            this.el.btnTabPageTokyo.removeClass('orange');
            this.el.btnTabPageOslo.removeClass('green');
            this.el.btnTabPageLondom.addClass('red');
        });
        this.el.btnTabPageParis.on('click', e =>{
            this.el.toggleTabPageLondom.hide();
            this.el.toggleTabPageTokyo.hide();
            this.el.toggleTabPageOslo.hide();
            this.el.toggleTabPageParis.show();
            this.el.btnTabPageLondom.removeClass('red');
            this.el.btnTabPageTokyo.removeClass('orange');
            this.el.btnTabPageOslo.removeClass('green');
            this.el.btnTabPageParis.addClass('blue');
        });
        this.el.btnTabPageTokyo.on('click', e =>{
            this.el.toggleTabPageLondom.hide();
            this.el.toggleTabPageParis.hide();
            this.el.toggleTabPageOslo.hide();
            this.el.toggleTabPageTokyo.show();
            this.el.btnTabPageLondom.removeClass('red');
            this.el.btnTabPageParis.removeClass('blue');
            this.el.btnTabPageOslo.removeClass('green');
            this.el.btnTabPageTokyo.addClass('orange');
        });
        this.el.btnTabPageOslo.on('click', e =>{
            this.el.toggleTabPageLondom.hide();
            this.el.toggleTabPageParis.hide();
            this.el.toggleTabPageTokyo.hide();
            this.el.toggleTabPageOslo.show();
            this.el.btnTabPageLondom.removeClass('red');
            this.el.btnTabPageParis.removeClass('blue');
            this.el.btnTabPageTokyo.removeClass('orange');
            this.el.btnTabPageOslo.addClass('green');
        });
    }
    // toggle tabs headers
    toggleTabsHeaders(){
        this.el.toggleTabHeaderLondom.show();
        this.el.btnTabHeaderLondom.addClass('red');
        this.el.btnTabHeaderLondom.on('click', e =>{
            this.el.toggleTabHeaderParis.hide();
            this.el.toggleTabHeaderTokyo.hide();
            this.el.toggleTabHeaderOslo.hide();
            this.el.toggleTabHeaderLondom.show();
            this.el.btnTabHeaderParis.removeClass('green');
            this.el.btnTabHeaderTokyo.removeClass('blue');
            this.el.btnTabHeaderOslo.removeClass('orange');
            this.el.btnTabHeaderLondom.addClass('red');
        });
        this.el.btnTabHeaderParis.on('click', e =>{
            this.el.toggleTabHeaderLondom.hide();
            this.el.toggleTabHeaderTokyo.hide();
            this.el.toggleTabHeaderOslo.hide();
            this.el.toggleTabHeaderParis.show();
            this.el.btnTabHeaderLondom.removeClass('red');
            this.el.btnTabHeaderTokyo.removeClass('blue');
            this.el.btnTabHeaderOslo.removeClass('orange');
            this.el.btnTabHeaderParis.addClass('green');
        });
        this.el.btnTabHeaderTokyo.on('click', e =>{
            this.el.toggleTabHeaderLondom.hide();
            this.el.toggleTabHeaderParis.hide();
            this.el.toggleTabHeaderOslo.hide();
            this.el.toggleTabHeaderTokyo.show();
            this.el.btnTabHeaderLondom.removeClass('red');
            this.el.btnTabHeaderParis.removeClass('green');
            this.el.btnTabHeaderOslo.removeClass('orange');
            this.el.btnTabHeaderTokyo.addClass('blue');
        });
        this.el.btnTabHeaderOslo.on('click', e =>{
            this.el.toggleTabHeaderLondom.hide();
            this.el.toggleTabHeaderParis.hide();
            this.el.toggleTabHeaderTokyo.hide();
            this.el.toggleTabHeaderOslo.show();
            this.el.btnTabHeaderLondom.removeClass('red');
            this.el.btnTabHeaderParis.removeClass('green');
            this.el.btnTabHeaderTokyo.removeClass('blue');
            this.el.btnTabHeaderOslo.addClass('orange');
        });
    }
    // toggle tabs
    toggleTabs(){
        this.el.paris.hide();
        this.el.tokyo.hide();
        this.el.londom.show();
        this.el.btnLondom.addClass('active');
        this.el.btnLondom.on('click', e =>{
            this.el.paris.hide();
            this.el.tokyo.hide();
            this.el.londom.show();
            this.el.btnParis.removeClass('active');
            this.el.btnTokyo.removeClass('active');
            this.el.btnLondom.addClass('active');
        });
        this.el.btnParis.on('click', e =>{
            this.el.londom.hide();
            this.el.tokyo.hide();
            this.el.paris.show();
            this.el.btnLondom.removeClass('active');
            this.el.btnTokyo.removeClass('active');
            this.el.btnParis.addClass('active');

        });
        this.el.btnTokyo.on('click', e =>{
            this.el.londom.hide();
            this.el.paris.hide();
            this.el.tokyo.show();
            this.el.btnParis.removeClass('active');
            this.el.btnLondom.removeClass('active');
            this.el.btnTokyo.addClass('active');
        });
    }
    // accordion
    accordion(){
          // accordion
          document.querySelectorAll('.accordion').forEach(acc =>{
            acc.on('click', e =>{
                // toggle to add or remove class active
                e.target.toggleClass('active');
                // toggle to show or hide panel 
                let panel = e.target.nextElementSibling;
                if(panel.style.maxHeight){
                    panel.style.maxHeight = null;
                }else{
                    panel.style.maxHeight = `${panel.scrollHeight}px`;
                }
            });
        });
    }
    // animate menu icon
    menuIconAnimate(){
        // menu icon animate
        document.querySelector('.topnav-icon-responsive').on('click', e =>{
            e.target.toggleClass('change');
        });
    }
}
window.default = new Default();