'use strict';
/*!
 * Bootstrap-fullscreen-select v1.5.1 (http://craftpip.github.io/bootstrap-fullscreen-select/)
 * Author: boniface pereira
 * Website: www.craftpip.com
 * Contact: hey@craftpip.com
 *
 * Copyright 2013-2014 bootstrap-select
 * Licensed under MIT (https://github.com/craftpip/bootstrap-fullscreen-select/blob/master/LICENSE)
 */

if (typeof jQuery === 'undefined') {
    throw new Error('Mobileselect\' requires jQuery');
}

(function ($) {

    $.fn.mobileSelect = function (options) {
        var $this = $(this);

        /*
         * backout if no elements are selected.
         */
        if (!$this.length)
            return 'no elements to process';

        /*
         * set an empty object if options === undefined
         */
        if (!options)
            options = {};

        if (typeof options === 'string') {
            if (options === 'destroy') {
                // destroy the mobile select initialization.
                $this.each(function (i, a) {
                    var id = $(a).attr('data-msid');
                    $.mobileSelect.elements[id].destroy();
                    delete $.mobileSelect.elements[id];
                });
            }
            if (options === 'sync' || options === 'refresh') {
                //sync changes in the options.
                $this.each(function (i, a) {
                    var id = $(a).attr('data-msid');
                    if(typeof id != 'undefined')
                        $.mobileSelect.elements[id].refresh();
                });
            }
            if (options === 'hide') {
                // programmically hide a shown mobileSelect
                $this.each(function (i, a) {
                    var id = $(a).attr('data-msid');
                    $.mobileSelect.elements[id].hide();
                });
            }
            if (options === 'show') {
                // programmicallly show a mobileSelect
                $this.each(function (i, a) {
                    var id = $(a).attr('data-msid');
                    $.mobileSelect.elements[id].show();
                });
            }
            return;
        }
        // if user defaults provided overwrite with mobileSelect defaults.
        if ($.mobileSelect.defaults) {
            $.extend($.fn.mobileSelect.defaults, $.mobileSelect.defaults);
        }
        // options to be merged with defaults.
        options = $.extend({}, $.fn.mobileSelect.defaults, options);
        // start iterating over!
        $this.each(function (i, a) {
            var $elm = $(a);
            //reject non SELECT elements
            if ($elm[0].tagName !== 'SELECT') {
                console.warn('Sorry, cannot initialized a ' + $elm[0].tagName + ' element');
                return true;
                // continue;
            }
            if ($elm.attr('data-msid') !== undefined) {
                console.error('This element is already Initialized');
                return true;
                // continue
            }
            // track objects via generated IDs
            var id = Math.floor(Math.random() * 999999);
            $elm.attr('data-msid', id);
            var mobileSelectObj = new Mobileselect(a, options);
            $.mobileSelect.elements[id] = mobileSelectObj;
        });
    };

    var Mobileselect = function (element, options) {
        this.$e = $(element);
        $.extend(this, options);
        this.init();
    };

    Mobileselect.prototype = {
        init: function () {
            this._setUserOptions();
            this._extractOptions();
            this._buildHTML();
            this._bindEvents();
            this.onInit.apply(this.$e);
        },
        _buildHTML: function () {

            /*
             * build and insert the trigger element
             */

            if (this.$e.attr('data-triggerOn') === undefined) {
                // no custom trigger element.
                if (this.$e.attr('data-style') !== undefined) {
                    this.style = this.$e.attr('data-style');
                }

                var b = this.$e.attr('disabled') || '';
                this.$e.before('<button type="button" class="btn ' + this.style + ' btn-mobileSelect-gen" '+b+'><span class="text"></span> <span class="caret"></span></button>');
                this.$triggerElement = this.$e.prev();
                this.$e.hide();
            } else {
                this.$triggerElement = $(this.$e.attr('data-triggerOn'));
            }

            /*
             * Build mobile select container HTML.
             */

            //seting up the container.
            this.$c = $('<div class="mobileSelect-container"></div>').addClass(this.theme).appendTo('body');

            //appending the container template
            this.$c.html($.fn.mobileSelect.defaults.template);

            //settings container animations.
            this.$c.children('div').css({
                '-webkit-transition': 'all ' + this.animationSpeed / 1000 + 's',
                'transition': 'all ' + this.animationSpeed / 1000 + 's'
            }).css(this.padding).addClass('anim-' + this.animation);

            /*
             * set title buttons text.
             */
            this.$c.find('.mobileSelect-title .title').html(this.title).end()
            .find('.mobileSelect-savebtn').html(this.buttonSave).end()
            .find('.mobileSelect-clearbtn').html(this.buttonClear).end()
            .find('.mobileSelect-selectallbtn').html(this.buttonSelectAll).end()
            .find('.mobileSelect-cancelbtn').html(this.buttonCancel).end()
            .find('.mobileSelect-search input').attr('placeholder', this.searchText).end();


            this.$listcontainer = this.$c.find('.list-container');
            if (!this.isMultiple) {
                this.$c.find('.mobileSelect-clearbtn').remove().end()
                .find('.mobileSelect-selectallbtn').remove().end()
                .find('.mobileSelect-title .multi-count').remove().end();
            } else {
                this.$listcontainer.data('multiple', 'true');
            }

            /* search option */
            if(!this.searchOption) {
                this.$c.find('.mobileSelect-search').remove();
                this.$c.find('.list-container').removeClass('has_search');
            }

            this._appendOptionsList();
        },
        _appendOptionsList: function () {

            /*
             * append options list.
             */
            this.$listcontainer.html('');
            var that = this;
            var prevGroup = '';
            $.each(this.options, function (i, a)
            {
                var b = '', image = '', altLabel = '', uns = '';

                if (a.group && a.group !== prevGroup)
                {
                    if (a.groupDisabled)
                    {
                        b = 'disabled';
                    }

                    that.$listcontainer.append('<span class="mobileSelect-group" ' + b + '>' + a.group + '</span>');
                    prevGroup = a.group;
                }

                if (a.groupDisabled || a.disabled || a.unselect)
                {
                    b = 'disabled';
                }

                if (a.unselect)
                {
                    uns = 'unselect';
                }

                if (a.image && a.image !== null)
                {
                    image = '<img class="ms-img" src="' + a.image + '" />';
                }

                if (a.alt_label && a.alt_label !== null)
                {
                    altLabel = '<span class="label-first">' + a.alt_label + '</span>';
                }

                // that.$listcontainer.append('<a href="#" class="mobileSelect-control" '+ b +' data-value="' + a.value + '">' + a.text + '</a>');
                that.$listcontainer.append('<li class="mobileSelect-control ' + uns +  ((a.image && a.image !== null) ? ' has-img' : '') + ((b == 'disabled') ? ' dbl' : '') + '" ' + b + ' data-value="' + a.value + '">' + image + altLabel + a.text + '</li>');
            });
            this.sync();
            this._updateBtnCount();
        },
        _updateBtnCount: function () {

            /*
             * Update generated button count.
             */
            if (this.$triggerElement.is('button') && this.$triggerElement.hasClass('btn-mobileSelect-gen')) {
                var a = this.$triggerElement.find('.text'),
                    b = this.$triggerElement.next().find('option:selected').text() || this.$e.val(),
                    c = this.$e.attr('data-btntitle'),
                    d = this.$e.attr('data-selected'),
                    e = this.$e.val()

                if (b === null && c === undefined) {
                    a.html("Nothing selected");
                    return false;
                }

                if (b === null) {
                    a.html(c);
                    return false;
                }

                if (this.isMultiple) {
                    if (b.length === 1) {
                        a.html(b);
                    } else {
                        if(d === undefined){
                            a.html(e.length + ' ' + ((this.multipleLabel != '') ? this.multipleLabel : 'items selected'));
                        }else{
                            a.html(b.length + ' ' + d);
                        }
                    }
                } else {
                    if (c === undefined) {
                        a.html(b);
                    }else{
                        a.html(c);
                    }
                }
            }
        },
        _bindEvents: function () {
            /*
             * binding events on trigger element & buttons.
             */
            var that = this;

            this.$triggerElement.on('click', function (e) {
                e.preventDefault();
                that.show();
            });

            this.$c.find('.mobileSelect-savebtn').on('click', function (e) {
                e.preventDefault();
                that.syncR();
                that.hide();
            });

            this.$c.find('.mobileSelect-clearbtn').on('click', function (e) {
                e.preventDefault();
                that.$listcontainer.find('.selected:not(.unselect)').removeClass('selected');
                that.$c.find('.mobileSelect-title .multi-count').empty().html(that.$listcontainer.find('.unselect').length > 0 ? '(' + that.$listcontainer.find('.unselect').length + ')' : '');
                that.syncR();
                // that.hide();
            });

            this.$c.find('.mobileSelect-selectallbtn').on('click', function (e) {
                e.preventDefault();
                that.$listcontainer.find('li.mobileSelect-control').addClass('selected');
                that.$c.find('.mobileSelect-title .multi-count').html('(' + that.$listcontainer.find('li.mobileSelect-control').length + ')');
                // that.syncR();
                // that.hide();
            });

            this.$c.find('.mobileSelect-cancelbtn').on('click', function (e) {
                e.preventDefault();
                that.hide();
            });

            this.$c.find('.mobileSelect-control').on('click', function (e) {
                e.preventDefault();
                var $this = $(this);

                if($this.attr('disabled') == 'disabled')
                	return false;

                if (that.isMultiple) {
                    $this.toggleClass('selected');
                    var text = that.$c.find('.mobileSelect-title .multi-count').text().replace(/[()]/g,'');
                    var cvalue = ((text == '') ? 0 : parseInt(text));
                    if($this.hasClass('selected')) {
                        that.$c.find('.mobileSelect-title .multi-count').html('(' + (cvalue + 1) + ')');
                    } else {
                        if((cvalue - 1) != 0) {
                            that.$c.find('.mobileSelect-title .multi-count').html('(' + (cvalue - 1) + ')');
                        } else {
                            that.$c.find('.mobileSelect-title .multi-count').empty();
                        }
                    }
                } else {
                    $this.siblings().removeClass('selected').end().addClass('selected');
                }
            });

            this.$c.find('.mobileSelect-search input[type="text"]').on('keyup', function (e) {
                e.preventDefault();
                var that = this, $allListElements = $(this).parent().parent().find('ul > li');
                var $matchingListElements = $allListElements.filter(function(i, li){
                    var listItemText = $(li).text().toUpperCase(), searchText = that.value.toUpperCase();
                    return ~listItemText.indexOf(searchText);
                });
                $allListElements.hide();
                $matchingListElements.show();
                return false;
            });

            this.$c.find('.mobileSelect-search-clear').on('click', function (e) {
                e.preventDefault();
                if(that.$c.find('.mobileSelect-search').length > 0) {
                    that.$c.find('.mobileSelect-search input[type="text"]').val('').end()
                    .find('.mobileSelect-search').parent().find('ul > li').show().end();
                }
            });
        },
        _unbindEvents: function () {

            /*
             * to unbind events while destroy.
             */
            this.$triggerElement.unbind('click');
            this.$c.find('.mobileSelect-savebtn').unbind('click');
            this.$c.find('.mobileSelect-clearbtn').unbind('click');
            this.$c.find('.mobileSelect-selectallbtn').unbind('click');
            this.$c.find('.mobileSelect-cancelbtn').unbind('click');
            this.$c.find('.mobileSelect-control').unbind('click');
            this.$c.find('.mobileSelect-search input[type="text"]').unbind('keyup');
            this.$c.find('.mobileSelect-search-clear').unbind('click');
        },
        sync: function () {

            /*
             * sync from select element to mobile select container
             */
            var selectedOptions = this.$e.val();
            if (!this.isMultiple)
                selectedOptions = [selectedOptions];
            this.$c.find('li').removeClass('selected');
            for (var i in selectedOptions) {
                this.$c.find('li[data-value="' + selectedOptions[i] + '"]').addClass('selected');
            }
        },
        syncR: function () {

            /*
             * sync from mobile select container to select element
             */
            var selectedOptions = [];
            this.$c.find('.selected').each(function () {
                selectedOptions.push($(this).data('value'));
            });
            this.$e.val(selectedOptions);
            this.onChange.apply(this.$e);
        },
        hide: function () {

            /*
             * hide animation with onClose callback
             */
            this.$c.children('div').addClass('anim-' + this.animation);
            var that = this;
            this._updateBtnCount();
            setTimeout(function () {
                /*clear search*/
                if(that.$c.find('.mobileSelect-search').length > 0) {
                    that.$c.find('.mobileSelect-search input[type="text"]').val('').end()
                    .find('.mobileSelect-search').parent().find('ul > li').show().end()
                    .find('.mobileSelect-title .multi-count').empty().end();
                }
                that.$c.hide();
                $('body').removeClass('mobileSelect-noscroll');
                that.onClose.apply(that.$e);
            }, this.animationSpeed);
        },
        show: function () {

            /*
             * show animation with onOpen callback
             */
            this.$c.show();
            this.sync();
            $('body').addClass('mobileSelect-noscroll');
            var that = this;
            if (that.$listcontainer.find('li.mobileSelect-control.selected').length > 0) {
                that.$c.find('.mobileSelect-title .multi-count').html('(' + that.$listcontainer.find('li.mobileSelect-control.selected').length + ')');
            }
            setTimeout(function () {
                that.$c.children('div').removeClass($.mobileSelect.animations.join(' '));
            }, 10);
            this.onOpen.apply(this.$e);
        },
        _setUserOptions: function () {

            /*
             * overwrite options with data-attributes if provided.
             */
            this.isMultiple = this.$e.attr('multiple') ? true : false;
            if (this.$e.data('title') !== undefined) {
                this.title = this.$e.data('title');
            }
            if (this.$e.data('animation') !== undefined) {
                this.animation = this.$e.data('animation');
            }
            if (this.$e.data('animation-speed') !== undefined) {
                this.animationSpeed = this.$e.data('animation-speed');
            }
            if (this.$e.data('padding') !== undefined) {
                this.padding = this.$e.data('padding');
            }
            if (this.$e.data('btntext-save') !== undefined) {
                this.buttonSave = this.$e.data('btntext-save');
            }
            if (this.$e.data('btntext-clear') !== undefined) {
                this.buttonClear = this.$e.data('btntext-clear');
            }
            if (this.$e.data('btntext-selectall') !== undefined) {
                this.buttonClear = this.$e.data('btntext-selectall');
            }
            if (this.$e.data('btntext-cancel') !== undefined) {
                this.buttonCancel = this.$e.data('btntext-cancel');
            }
            if (this.$e.data('theme') !== undefined) {
                this.theme = this.$e.data('theme');
            }
            if (this.animation === 'none') {
                this.animationSpeed = 0;
            }
        },
        _extractOptions: function () {

            /*
             * Get options from the select element and store them in an array.
             */
            var options = [];
            $.each(this.$e.find('option'), function (i, a)
            {
                var $t = $(a);
                if ($t.text())
                {
                    // var label = $t.parent().is('optgroup') ? $t.parent().attr('label') : false;
                    var label = false;
                    var labelDisabled = false;

                    if ($t.parent().is('optgroup'))
                    {
                        label = $t.parent().attr('label');
                        labelDisabled = $t.parent().prop('disabled');
                    }

                    options.push({
                        value: $t.val(),
                        text: $.trim($t.text()),
                        disabled: $t.prop('disabled'),
                        group: label,
                        groupDisabled: labelDisabled,
                        unselect: typeof $t.attr('unselect') !== 'undefined',
                        image: (typeof $t.attr('data-image-src') !== 'undefined') ? $t.attr('data-image-src') : null,
                        alt_label: (typeof $t.attr('data-alt-label') !== 'undefined') ? $t.attr('data-alt-label') : null,
                    });

                }
            });
            this.options = options;
        },
        destroy: function () {

            /*
             * destroy the select
             * unbind events
             * remove triggerElement, container
             * show the Native select
             */
            this.$e.removeAttr('data-msid');
            this._unbindEvents();
            this.$triggerElement.remove();
            this.$c.remove();
            this.$e.show();
            // console.log('done');
        },
        refresh: function () {

            /*
             * refresh/sync the native select with the mobileSelect.
             */
            this._extractOptions();
            this._appendOptionsList();
            this._unbindEvents();
            this._bindEvents();
        }
    };

    /*
     * for user defaults.
     */
    $.mobileSelect = {
        elements: {}, //to store records
        animations: ['anim-top', 'anim-bottom', 'anim-left', 'anim-right', 'anim-opacity', 'anim-scale', 'anim-zoom', 'anim-none'] //supported animations
    };

    /*
     * plugin defaults
     */
    $.fn.mobileSelect.defaults = {
        template: '<div> <div class="mobileSelect-title"><span class="title"></span> <span class="multi-count"></span></div><div class="mobileSelect-search"> <input type="text" placeholder="Search"> <a href="javascript:;" class="cleartext mobileSelect-search-clear"><i class="pe-7s-close"></i></a> </div><ul class="list-container has_search list"></ul> <div class="mobileSelect-buttons"> <a href="javascript:;" class="mobileSelect-savebtn"></a> <a href="javascript:;" class="mobileSelect-selectallbtn"></a> <a href="javascript:;" class="mobileSelect-clearbtn"></a> <a href="javascript:;" class="mobileSelect-cancelbtn"></a> </div></div>',
        title: 'Select an option',
        buttonSave: 'Ok',
        buttonClear: 'Clear',
        buttonSelectAll: 'Select All',
        buttonCancel: 'Cancel',
        searchOption: true,
        multipleLabel: 'items selected',
        searchText: 'Search Text',
        padding: {
            'top': '20px',
            'left': '20px',
            'right': '20px',
            'bottom': '20px'
        },
        animation: 'scale',
        animationSpeed: 200,
        theme: 'white',
        onOpen: function () {
        },
        onClose: function () {
        },
        onChange: function() {
        },
        onInit: function () {  
        },
        style: 'btn-default select-style'
    };

})(jQuery);
