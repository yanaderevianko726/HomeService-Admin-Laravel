/*
 * File name: adminlte.js
 * Last modified: 2021.01.28 at 23:37:25
 * Author: SmarterVision - https://codecanyon.net/user/smartervision
 * Copyright (c) 2021
 */
(function (global, factory) {
  typeof exports === 'object' && typeof module !== 'undefined' ? factory(exports, require('jquery')) :
  typeof define === 'function' && define.amd ? define(['exports', 'jquery'], factory) :
  (global = typeof globalThis !== 'undefined' ? globalThis : global || self, factory(global.adminlte = {}, global.jQuery));
}(this, (function (exports, $) { 'use strict';

  function _interopDefaultLegacy (e) { return e && typeof e === 'object' && 'default' in e ? e : { 'default': e }; }

  var $__default = /*#__PURE__*/_interopDefaultLegacy($);

  /**
   * --------------------------------------------
   * AdminLTE CardWidget.js
   * License MIT
   * --------------------------------------------
   */
  /**
   * Constants
   * ====================================================
   */

  const NAME = 'CardWidget';
  const DATA_KEY = 'lte.cardwidget';
  const EVENT_KEY = `.${DATA_KEY}`;
  const JQUERY_NO_CONFLICT = $__default['default'].fn[NAME];
  const EVENT_EXPANDED = `expanded${EVENT_KEY}`;
  const EVENT_COLLAPSED = `collapsed${EVENT_KEY}`;
  const EVENT_MAXIMIZED = `maximized${EVENT_KEY}`;
  const EVENT_MINIMIZED = `minimized${EVENT_KEY}`;
  const EVENT_REMOVED = `removed${EVENT_KEY}`;
  const CLASS_NAME_CARD = 'card';
  const CLASS_NAME_COLLAPSED = 'collapsed-card';
  const CLASS_NAME_COLLAPSING = 'collapsing-card';
  const CLASS_NAME_EXPANDING = 'expanding-card';
  const CLASS_NAME_WAS_COLLAPSED = 'was-collapsed';
  const CLASS_NAME_MAXIMIZED = 'maximized-card';
  const SELECTOR_DATA_REMOVE = '[data-card-widget="remove"]';
  const SELECTOR_DATA_COLLAPSE = '[data-card-widget="collapse"]';
  const SELECTOR_DATA_MAXIMIZE = '[data-card-widget="maximize"]';
  const SELECTOR_CARD = `.${CLASS_NAME_CARD}`;
  const SELECTOR_CARD_HEADER = '.card-header';
  const SELECTOR_CARD_BODY = '.card-body';
  const SELECTOR_CARD_FOOTER = '.card-footer';
  const Default = {
    animationSpeed: 'normal',
    collapseTrigger: SELECTOR_DATA_COLLAPSE,
    removeTrigger: SELECTOR_DATA_REMOVE,
    maximizeTrigger: SELECTOR_DATA_MAXIMIZE,
    collapseIcon: 'fa-minus',
    expandIcon: 'fa-plus',
    maximizeIcon: 'fa-expand',
    minimizeIcon: 'fa-compress'
  };

  class CardWidget {
    constructor(element, settings) {
      this._element = element;
      this._parent = element.parents(SELECTOR_CARD).first();

      if (element.hasClass(CLASS_NAME_CARD)) {
        this._parent = element;
      }

      this._settings = $__default['default'].extend({}, Default, settings);
    }

    collapse() {
      this._parent.addClass(CLASS_NAME_COLLAPSING).children(`${SELECTOR_CARD_BODY}, ${SELECTOR_CARD_FOOTER}`).slideUp(this._settings.animationSpeed, () => {
        this._parent.addClass(CLASS_NAME_COLLAPSED).removeClass(CLASS_NAME_COLLAPSING);
      });

      this._parent.find(`> ${SELECTOR_CARD_HEADER} ${this._settings.collapseTrigger} .${this._settings.collapseIcon}`).addClass(this._settings.expandIcon).removeClass(this._settings.collapseIcon);

      this._element.trigger($__default['default'].Event(EVENT_COLLAPSED), this._parent);
    }

    expand() {
      this._parent.addClass(CLASS_NAME_EXPANDING).children(`${SELECTOR_CARD_BODY}, ${SELECTOR_CARD_FOOTER}`).slideDown(this._settings.animationSpeed, () => {
        this._parent.removeClass(CLASS_NAME_COLLAPSED).removeClass(CLASS_NAME_EXPANDING);
      });

      this._parent.find(`> ${SELECTOR_CARD_HEADER} ${this._settings.collapseTrigger} .${this._settings.expandIcon}`).addClass(this._settings.collapseIcon).removeClass(this._settings.expandIcon);

      this._element.trigger($__default['default'].Event(EVENT_EXPANDED), this._parent);
    }

    remove() {
      this._parent.slideUp();

      this._element.trigger($__default['default'].Event(EVENT_REMOVED), this._parent);
    }

    toggle() {
      if (this._parent.hasClass(CLASS_NAME_COLLAPSED)) {
        this.expand();
        return;
      }

      this.collapse();
    }

    maximize() {
      this._parent.find(`${this._settings.maximizeTrigger} .${this._settings.maximizeIcon}`).addClass(this._settings.minimizeIcon).removeClass(this._settings.maximizeIcon);

      this._parent.css({
        height: this._parent.height(),
        width: this._parent.width(),
        transition: 'all .15s'
      }).delay(150).queue(function () {
        const $element = $__default['default'](this);
        $element.addClass(CLASS_NAME_MAXIMIZED);
        $__default['default']('html').addClass(CLASS_NAME_MAXIMIZED);

        if ($element.hasClass(CLASS_NAME_COLLAPSED)) {
          $element.addClass(CLASS_NAME_WAS_COLLAPSED);
        }

        $element.dequeue();
      });

      this._element.trigger($__default['default'].Event(EVENT_MAXIMIZED), this._parent);
    }

    minimize() {
      this._parent.find(`${this._settings.maximizeTrigger} .${this._settings.minimizeIcon}`).addClass(this._settings.maximizeIcon).removeClass(this._settings.minimizeIcon);

      this._parent.css('cssText', `height: ${this._parent[0].style.height} !important; width: ${this._parent[0].style.width} !important; transition: all .15s;`).delay(10).queue(function () {
        const $element = $__default['default'](this);
        $element.removeClass(CLASS_NAME_MAXIMIZED);
        $__default['default']('html').removeClass(CLASS_NAME_MAXIMIZED);
        $element.css({
          height: 'inherit',
          width: 'inherit'
        });

        if ($element.hasClass(CLASS_NAME_WAS_COLLAPSED)) {
          $element.removeClass(CLASS_NAME_WAS_COLLAPSED);
        }

        $element.dequeue();
      });

      this._element.trigger($__default['default'].Event(EVENT_MINIMIZED), this._parent);
    }

    toggleMaximize() {
      if (this._parent.hasClass(CLASS_NAME_MAXIMIZED)) {
        this.minimize();
        return;
      }

      this.maximize();
    } // Private


    _init(card) {
      this._parent = card;
      $__default['default'](this).find(this._settings.collapseTrigger).click(() => {
        this.toggle();
      });
      $__default['default'](this).find(this._settings.maximizeTrigger).click(() => {
        this.toggleMaximize();
      });
      $__default['default'](this).find(this._settings.removeTrigger).click(() => {
        this.remove();
      });
    } // Static


    static _jQueryInterface(config) {
      let data = $__default['default'](this).data(DATA_KEY);

      const _options = $__default['default'].extend({}, Default, $__default['default'](this).data());

      if (!data) {
        data = new CardWidget($__default['default'](this), _options);
        $__default['default'](this).data(DATA_KEY, typeof config === 'string' ? data : config);
      }

      if (typeof config === 'string' && config.match(/collapse|expand|remove|toggle|maximize|minimize|toggleMaximize/)) {
        data[config]();
      } else if (typeof config === 'object') {
        data._init($__default['default'](this));
      }
    }

  }
  /**
   * Data API
   * ====================================================
   */


  $__default['default'](document).on('click', SELECTOR_DATA_COLLAPSE, function (event) {
    if (event) {
      event.preventDefault();
    }

    CardWidget._jQueryInterface.call($__default['default'](this), 'toggle');
  });
  $__default['default'](document).on('click', SELECTOR_DATA_REMOVE, function (event) {
    if (event) {
      event.preventDefault();
    }

    CardWidget._jQueryInterface.call($__default['default'](this), 'remove');
  });
  $__default['default'](document).on('click', SELECTOR_DATA_MAXIMIZE, function (event) {
    if (event) {
      event.preventDefault();
    }

    CardWidget._jQueryInterface.call($__default['default'](this), 'toggleMaximize');
  });
  /**
   * jQuery API
   * ====================================================
   */

  $__default['default'].fn[NAME] = CardWidget._jQueryInterface;
  $__default['default'].fn[NAME].Constructor = CardWidget;

  $__default['default'].fn[NAME].noConflict = function () {
    $__default['default'].fn[NAME] = JQUERY_NO_CONFLICT;
    return CardWidget._jQueryInterface;
  };

  /**
   * --------------------------------------------
   * AdminLTE ControlSidebar.js
   * License MIT
   * --------------------------------------------
   */
  /**
   * Constants
   * ====================================================
   */

  const NAME$1 = 'ControlSidebar';
  const DATA_KEY$1 = 'lte.controlsidebar';
  const EVENT_KEY$1 = `.${DATA_KEY$1}`;
  const JQUERY_NO_CONFLICT$1 = $__default['default'].fn[NAME$1];
  const EVENT_COLLAPSED$1 = `collapsed${EVENT_KEY$1}`;
  const EVENT_EXPANDED$1 = `expanded${EVENT_KEY$1}`;
  const SELECTOR_CONTROL_SIDEBAR = '.control-sidebar';
  const SELECTOR_CONTROL_SIDEBAR_CONTENT = '.control-sidebar-content';
  const SELECTOR_DATA_TOGGLE = '[data-widget="control-sidebar"]';
  const SELECTOR_HEADER = '.main-header';
  const SELECTOR_FOOTER = '.main-footer';
  const CLASS_NAME_CONTROL_SIDEBAR_ANIMATE = 'control-sidebar-animate';
  const CLASS_NAME_CONTROL_SIDEBAR_OPEN = 'control-sidebar-open';
  const CLASS_NAME_CONTROL_SIDEBAR_SLIDE = 'control-sidebar-slide-open';
  const CLASS_NAME_LAYOUT_FIXED = 'layout-fixed';
  const CLASS_NAME_NAVBAR_FIXED = 'layout-navbar-fixed';
  const CLASS_NAME_NAVBAR_SM_FIXED = 'layout-sm-navbar-fixed';
  const CLASS_NAME_NAVBAR_MD_FIXED = 'layout-md-navbar-fixed';
  const CLASS_NAME_NAVBAR_LG_FIXED = 'layout-lg-navbar-fixed';
  const CLASS_NAME_NAVBAR_XL_FIXED = 'layout-xl-navbar-fixed';
  const CLASS_NAME_FOOTER_FIXED = 'layout-footer-fixed';
  const CLASS_NAME_FOOTER_SM_FIXED = 'layout-sm-footer-fixed';
  const CLASS_NAME_FOOTER_MD_FIXED = 'layout-md-footer-fixed';
  const CLASS_NAME_FOOTER_LG_FIXED = 'layout-lg-footer-fixed';
  const CLASS_NAME_FOOTER_XL_FIXED = 'layout-xl-footer-fixed';
  const Default$1 = {
    controlsidebarSlide: true,
    scrollbarTheme: 'os-theme-light',
    scrollbarAutoHide: 'l',
    target: SELECTOR_CONTROL_SIDEBAR
  };
  /**
   * Class Definition
   * ====================================================
   */

  class ControlSidebar {
    constructor(element, config) {
      this._element = element;
      this._config = config;
    } // Public


    collapse() {
      const $body = $__default['default']('body');
      const $html = $__default['default']('html');
      const that = this; // Show the control sidebar

      if (this._config.controlsidebarSlide) {
        $html.addClass(CLASS_NAME_CONTROL_SIDEBAR_ANIMATE);
        $body.removeClass(CLASS_NAME_CONTROL_SIDEBAR_SLIDE).delay(300).queue(function () {
          $__default['default'](that._config.target).hide();
          $html.removeClass(CLASS_NAME_CONTROL_SIDEBAR_ANIMATE);
          $__default['default'](this).dequeue();
        });
      } else {
        $body.removeClass(CLASS_NAME_CONTROL_SIDEBAR_OPEN);
      }

      $__default['default'](this._element).trigger($__default['default'].Event(EVENT_COLLAPSED$1));
    }

    show() {
      const $body = $__default['default']('body');
      const $html = $__default['default']('html'); // Collapse the control sidebar

      if (this._config.controlsidebarSlide) {
        $html.addClass(CLASS_NAME_CONTROL_SIDEBAR_ANIMATE);
        $__default['default'](this._config.target).show().delay(10).queue(function () {
          $body.addClass(CLASS_NAME_CONTROL_SIDEBAR_SLIDE).delay(300).queue(function () {
            $html.removeClass(CLASS_NAME_CONTROL_SIDEBAR_ANIMATE);
            $__default['default'](this).dequeue();
          });
          $__default['default'](this).dequeue();
        });
      } else {
        $body.addClass(CLASS_NAME_CONTROL_SIDEBAR_OPEN);
      }

      this._fixHeight();

      this._fixScrollHeight();

      $__default['default'](this._element).trigger($__default['default'].Event(EVENT_EXPANDED$1));
    }

    toggle() {
      const $body = $__default['default']('body');
      const shouldClose = $body.hasClass(CLASS_NAME_CONTROL_SIDEBAR_OPEN) || $body.hasClass(CLASS_NAME_CONTROL_SIDEBAR_SLIDE);

      if (shouldClose) {
        // Close the control sidebar
        this.collapse();
      } else {
        // Open the control sidebar
        this.show();
      }
    } // Private


    _init() {
      const $body = $__default['default']('body');
      const shouldNotHideAll = $body.hasClass(CLASS_NAME_CONTROL_SIDEBAR_OPEN) || $body.hasClass(CLASS_NAME_CONTROL_SIDEBAR_SLIDE);

      if (shouldNotHideAll) {
        $__default['default'](SELECTOR_CONTROL_SIDEBAR).not(this._config.target).hide();
        $__default['default'](this._config.target).css('display', 'block');
      } else {
        $__default['default'](SELECTOR_CONTROL_SIDEBAR).hide();
      }

      this._fixHeight();

      this._fixScrollHeight();

      $__default['default'](window).resize(() => {
        this._fixHeight();

        this._fixScrollHeight();
      });
      $__default['default'](window).scroll(() => {
        const $body = $__default['default']('body');
        const shouldFixHeight = $body.hasClass(CLASS_NAME_CONTROL_SIDEBAR_OPEN) || $body.hasClass(CLASS_NAME_CONTROL_SIDEBAR_SLIDE);

        if (shouldFixHeight) {
          this._fixScrollHeight();
        }
      });
    }

    _isNavbarFixed() {
      const $body = $__default['default']('body');
      return $body.hasClass(CLASS_NAME_NAVBAR_FIXED) || $body.hasClass(CLASS_NAME_NAVBAR_SM_FIXED) || $body.hasClass(CLASS_NAME_NAVBAR_MD_FIXED) || $body.hasClass(CLASS_NAME_NAVBAR_LG_FIXED) || $body.hasClass(CLASS_NAME_NAVBAR_XL_FIXED);
    }

    _isFooterFixed() {
      const $body = $__default['default']('body');
      return $body.hasClass(CLASS_NAME_FOOTER_FIXED) || $body.hasClass(CLASS_NAME_FOOTER_SM_FIXED) || $body.hasClass(CLASS_NAME_FOOTER_MD_FIXED) || $body.hasClass(CLASS_NAME_FOOTER_LG_FIXED) || $body.hasClass(CLASS_NAME_FOOTER_XL_FIXED);
    }

    _fixScrollHeight() {
      const $body = $__default['default']('body');
      const $controlSidebar = $__default['default'](this._config.target);

      if (!$body.hasClass(CLASS_NAME_LAYOUT_FIXED)) {
        return;
      }

      const heights = {
        scroll: $__default['default'](document).height(),
        window: $__default['default'](window).height(),
        header: $__default['default'](SELECTOR_HEADER).outerHeight(),
        footer: $__default['default'](SELECTOR_FOOTER).outerHeight()
      };
      const positions = {
        bottom: Math.abs(heights.window + $__default['default'](window).scrollTop() - heights.scroll),
        top: $__default['default'](window).scrollTop()
      };
      const navbarFixed = this._isNavbarFixed() && $__default['default'](SELECTOR_HEADER).css('position') === 'fixed';
      const footerFixed = this._isFooterFixed() && $__default['default'](SELECTOR_FOOTER).css('position') === 'fixed';
      const $controlsidebarContent = $__default['default'](`${this._config.target}, ${this._config.target} ${SELECTOR_CONTROL_SIDEBAR_CONTENT}`);

      if (positions.top === 0 && positions.bottom === 0) {
        $controlSidebar.css({
          bottom: heights.footer,
          top: heights.header
        });
        $controlsidebarContent.css('height', heights.window - (heights.header + heights.footer));
      } else if (positions.bottom <= heights.footer) {
        if (footerFixed === false) {
          const top = heights.header - positions.top;
          $controlSidebar.css('bottom', heights.footer - positions.bottom).css('top', top >= 0 ? top : 0);
          $controlsidebarContent.css('height', heights.window - (heights.footer - positions.bottom));
        } else {
          $controlSidebar.css('bottom', heights.footer);
        }
      } else if (positions.top <= heights.header) {
        if (navbarFixed === false) {
          $controlSidebar.css('top', heights.header - positions.top);
          $controlsidebarContent.css('height', heights.window - (heights.header - positions.top));
        } else {
          $controlSidebar.css('top', heights.header);
        }
      } else if (navbarFixed === false) {
        $controlSidebar.css('top', 0);
        $controlsidebarContent.css('height', heights.window);
      } else {
        $controlSidebar.css('top', heights.header);
      }

      if (footerFixed && navbarFixed) {
        $controlsidebarContent.css('height', '100%');
        $controlSidebar.css('height', '');
      } else if (footerFixed || navbarFixed) {
        $controlsidebarContent.css('height', '100%');
        $controlsidebarContent.css('height', '');
      }
    }

    _fixHeight() {
      const $body = $__default['default']('body');
      const $controlSidebar = $__default['default'](`${this._config.target} ${SELECTOR_CONTROL_SIDEBAR_CONTENT}`);

      if (!$body.hasClass(CLASS_NAME_LAYOUT_FIXED)) {
        $controlSidebar.attr('style', '');
        return;
      }

      const heights = {
        window: $__default['default'](window).height(),
        header: $__default['default'](SELECTOR_HEADER).outerHeight(),
        footer: $__default['default'](SELECTOR_FOOTER).outerHeight()
      };
      let sidebarHeight = heights.window - heights.header;

      if (this._isFooterFixed() && $__default['default'](SELECTOR_FOOTER).css('position') === 'fixed') {
        sidebarHeight = heights.window - heights.header - heights.footer;
      }

      $controlSidebar.css('height', sidebarHeight);

      if (typeof $__default['default'].fn.overlayScrollbars !== 'undefined') {
        $controlSidebar.overlayScrollbars({
          className: this._config.scrollbarTheme,
          sizeAutoCapable: true,
          scrollbars: {
            autoHide: this._config.scrollbarAutoHide,
            clickScrolling: true
          }
        });
      }
    } // Static


    static _jQueryInterface(operation) {
      return this.each(function () {
        let data = $__default['default'](this).data(DATA_KEY$1);

        const _options = $__default['default'].extend({}, Default$1, $__default['default'](this).data());

        if (!data) {
          data = new ControlSidebar(this, _options);
          $__default['default'](this).data(DATA_KEY$1, data);
        }

        if (data[operation] === 'undefined') {
          throw new Error(`${operation} is not a function`);
        }

        data[operation]();
      });
    }

  }
  /**
   *
   * Data Api implementation
   * ====================================================
   */


  $__default['default'](document).on('click', SELECTOR_DATA_TOGGLE, function (event) {
    event.preventDefault();

    ControlSidebar._jQueryInterface.call($__default['default'](this), 'toggle');
  });
  $__default['default'](document).ready(() => {
    ControlSidebar._jQueryInterface.call($__default['default'](SELECTOR_DATA_TOGGLE), '_init');
  });
  /**
   * jQuery API
   * ====================================================
   */

  $__default['default'].fn[NAME$1] = ControlSidebar._jQueryInterface;
  $__default['default'].fn[NAME$1].Constructor = ControlSidebar;

  $__default['default'].fn[NAME$1].noConflict = function () {
    $__default['default'].fn[NAME$1] = JQUERY_NO_CONFLICT$1;
    return ControlSidebar._jQueryInterface;
  };

  /**
   * --------------------------------------------
   * AdminLTE Dropdown.js
   * License MIT
   * --------------------------------------------
   */
  /**
   * Constants
   * ====================================================
   */

  const NAME$2 = 'Dropdown';
  const DATA_KEY$2 = 'lte.dropdown';
  const JQUERY_NO_CONFLICT$2 = $__default['default'].fn[NAME$2];
  const SELECTOR_NAVBAR = '.navbar';
  const SELECTOR_DROPDOWN_MENU = '.dropdown-menu';
  const SELECTOR_DROPDOWN_MENU_ACTIVE = '.dropdown-menu.show';
  const SELECTOR_DROPDOWN_TOGGLE = '[data-toggle="dropdown"]';
  const CLASS_NAME_DROPDOWN_RIGHT = 'dropdown-menu-right';
  const CLASS_NAME_DROPDOWN_SUBMENU = 'dropdown-submenu'; // TODO: this is unused; should be removed along with the extend?

  const Default$2 = {};
  /**
   * Class Definition
   * ====================================================
   */

  class Dropdown {
    constructor(element, config) {
      this._config = config;
      this._element = element;
    } // Public


    toggleSubmenu() {
      this._element.siblings().show().toggleClass('show');

      if (!this._element.next().hasClass('show')) {
        this._element.parents(SELECTOR_DROPDOWN_MENU).first().find('.show').removeClass('show').hide();
      }

      this._element.parents('li.nav-item.dropdown.show').on('hidden.bs.dropdown', () => {
        $__default['default']('.dropdown-submenu .show').removeClass('show').hide();
      });
    }

    fixPosition() {
      const $element = $__default['default'](SELECTOR_DROPDOWN_MENU_ACTIVE);

      if ($element.length === 0) {
        return;
      }

      if ($element.hasClass(CLASS_NAME_DROPDOWN_RIGHT)) {
        $element.css({
          left: 'inherit',
          right: 0
        });
      } else {
        $element.css({
          left: 0,
          right: 'inherit'
        });
      }

      const offset = $element.offset();
      const width = $element.width();
      const visiblePart = $__default['default'](window).width() - offset.left;

      if (offset.left < 0) {
        $element.css({
          left: 'inherit',
          right: offset.left - 5
        });
      } else if (visiblePart < width) {
        $element.css({
          left: 'inherit',
          right: 0
        });
      }
    } // Static


    static _jQueryInterface(config) {
      return this.each(function () {
        let data = $__default['default'](this).data(DATA_KEY$2);

        const _config = $__default['default'].extend({}, Default$2, $__default['default'](this).data());

        if (!data) {
          data = new Dropdown($__default['default'](this), _config);
          $__default['default'](this).data(DATA_KEY$2, data);
        }

        if (config === 'toggleSubmenu' || config === 'fixPosition') {
          data[config]();
        }
      });
    }

  }
  /**
   * Data API
   * ====================================================
   */


  $__default['default'](`${SELECTOR_DROPDOWN_MENU} ${SELECTOR_DROPDOWN_TOGGLE}`).on('click', function (event) {
    event.preventDefault();
    event.stopPropagation();

    Dropdown._jQueryInterface.call($__default['default'](this), 'toggleSubmenu');
  });
  $__default['default'](`${SELECTOR_NAVBAR} ${SELECTOR_DROPDOWN_TOGGLE}`).on('click', event => {
    event.preventDefault();

    if ($__default['default'](event.target).parent().hasClass(CLASS_NAME_DROPDOWN_SUBMENU)) {
      return;
    }

      setTimeout(function () {
          Dropdown._jQueryInterface.call($__default['default'](this), 'fixPosition');
      }, 1);
  });
    /**
     * jQuery API
     * ====================================================
     */

    $__default['default'].fn[NAME$2] = Dropdown._jQueryInterface;
    $__default['default'].fn[NAME$2].Constructor = Dropdown;

    $__default['default'].fn[NAME$2].noConflict = function () {
        $__default['default'].fn[NAME$2] = JQUERY_NO_CONFLICT$2;
        return Dropdown._jQueryInterface;
    };

    /**
     * --------------------------------------------
     * AdminLTE ExpandableTable.js
     * License MIT
     * --------------------------------------------
     */
    /**
     * Constants
     * ====================================================
     */

    const NAME$3 = 'ExpandableTable';
    const DATA_KEY$3 = 'lte.expandableTable';
    const EVENT_KEY$2 = `.${DATA_KEY$3}`;
    const JQUERY_NO_CONFLICT$3 = $__default['default'].fn[NAME$3];
    const EVENT_EXPANDED$2 = `expanded${EVENT_KEY$2}`;
    const EVENT_COLLAPSED$2 = `collapsed${EVENT_KEY$2}`;
    const SELECTOR_TABLE = '.expandable-table';
    const SELECTOR_DATA_TOGGLE$1 = '[data-widget="expandable-table"]';
    const SELECTOR_ARIA_ATTR = 'aria-expanded';

    /**
     * Class Definition
     * ====================================================
     */

    class ExpandableTable {
        constructor(element, options) {
            this._options = options;
            this._element = element;
        } // Public

        static _jQueryInterface(operation) {
            return this.each(function () {
                let data = $__default['default'](this).data(DATA_KEY$3);

                if (!data) {
                    data = new ExpandableTable($__default['default'](this));
                    $__default['default'](this).data(DATA_KEY$3, data);
                }

                if (typeof operation === 'string' && operation.match(/init|toggleRow/)) {
                    data[operation]();
                }
            });
        }

        init() {
            $__default['default'](SELECTOR_DATA_TOGGLE$1).each((_, $header) => {
                const $type = $__default['default']($header).attr(SELECTOR_ARIA_ATTR);
                const $body = $__default['default']($header).next().children().first().children();

                if ($type === 'true') {
                    $body.show();
                } else if ($type === 'false') {
                    $body.hide();
                    $body.parent().parent().addClass('d-none');
                }
            });
        }

        toggleRow() {
            const $element = this._element;
            const time = 500;
            const $type = $element.attr(SELECTOR_ARIA_ATTR);
            const $body = $element.next().children().first().children();
            $body.stop();

            if ($type === 'true') {
                $body.slideUp(time, () => {
                    $element.next().addClass('d-none');
                });
                $element.attr(SELECTOR_ARIA_ATTR, 'false');
                $element.trigger($__default['default'].Event(EVENT_COLLAPSED$2));
            } else if ($type === 'false') {
                $element.next().removeClass('d-none');
                $body.slideDown(time);
                $element.attr(SELECTOR_ARIA_ATTR, 'true');
                $element.trigger($__default['default'].Event(EVENT_EXPANDED$2));
            }
        } // Static

    }

    /**
     * Data API
     * ====================================================
     */


    $__default['default'](SELECTOR_TABLE).ready(function () {
        ExpandableTable._jQueryInterface.call($__default['default'](this), 'init');
    });
    $__default['default'](document).on('click', SELECTOR_DATA_TOGGLE$1, function () {
        ExpandableTable._jQueryInterface.call($__default['default'](this), 'toggleRow');
    });
    /**
     * jQuery API
     * ====================================================
     */

    $__default['default'].fn[NAME$3] = ExpandableTable._jQueryInterface;
    $__default['default'].fn[NAME$3].Constructor = ExpandableTable;

    $__default['default'].fn[NAME$3].noConflict = function () {
        $__default['default'].fn[NAME$3] = JQUERY_NO_CONFLICT$3;
        return ExpandableTable._jQueryInterface;
    };

    /**
     * --------------------------------------------
     * AdminLTE Layout.js
     * License MIT
     * --------------------------------------------
     */
    /**
     * Constants
     * ====================================================
     */

    const NAME$4 = 'Layout';
    const DATA_KEY$4 = 'lte.layout';
    const JQUERY_NO_CONFLICT$4 = $__default['default'].fn[NAME$4];
    const SELECTOR_HEADER$1 = '.main-header';
    const SELECTOR_MAIN_SIDEBAR = '.main-sidebar';
    const SELECTOR_SIDEBAR = '.main-sidebar .sidebar';
    const SELECTOR_CONTENT = '.content-wrapper';
    const SELECTOR_CONTROL_SIDEBAR_CONTENT$1 = '.control-sidebar-content';
    const SELECTOR_CONTROL_SIDEBAR_BTN = '[data-widget="control-sidebar"]';
    const SELECTOR_FOOTER$1 = '.main-footer';
    const SELECTOR_PUSHMENU_BTN = '[data-widget="pushmenu"]';
    const SELECTOR_LOGIN_BOX = '.login-box';
    const SELECTOR_REGISTER_BOX = '.register-box';
    const CLASS_NAME_SIDEBAR_COLLAPSED = 'sidebar-collapse';
    const CLASS_NAME_SIDEBAR_FOCUSED = 'sidebar-focused';
    const CLASS_NAME_LAYOUT_FIXED$1 = 'layout-fixed';
    const CLASS_NAME_CONTROL_SIDEBAR_SLIDE_OPEN = 'control-sidebar-slide-open';
    const CLASS_NAME_CONTROL_SIDEBAR_OPEN$1 = 'control-sidebar-open';
    const Default$3 = {
        scrollbarTheme: 'os-theme-light',
        scrollbarAutoHide: 'l',
        panelAutoHeight: true,
        panelAutoHeightMode: 'min-height',
        loginRegisterAutoHeight: true
    };

    /**
     * Class Definition
     * ====================================================
     */

    class Layout {
        constructor(element, config) {
            this._config = config;
            this._element = element;
        } // Public


        fixLayoutHeight(extra = null) {
            const $body = $__default['default']('body');
            let controlSidebar = 0;

            if ($body.hasClass(CLASS_NAME_CONTROL_SIDEBAR_SLIDE_OPEN) || $body.hasClass(CLASS_NAME_CONTROL_SIDEBAR_OPEN$1) || extra === 'control_sidebar') {
                controlSidebar = $__default['default'](SELECTOR_CONTROL_SIDEBAR_CONTENT$1).outerHeight();
      }

      const heights = {
        window: $__default['default'](window).height(),
        header: $__default['default'](SELECTOR_HEADER$1).length > 0 ? $__default['default'](SELECTOR_HEADER$1).outerHeight() : 0,
        footer: $__default['default'](SELECTOR_FOOTER$1).length > 0 ? $__default['default'](SELECTOR_FOOTER$1).outerHeight() : 0,
        sidebar: $__default['default'](SELECTOR_SIDEBAR).length > 0 ? $__default['default'](SELECTOR_SIDEBAR).height() : 0,
        controlSidebar
      };

      const max = this._max(heights);

      let offset = this._config.panelAutoHeight;

      if (offset === true) {
        offset = 0;
      }

      const $contentSelector = $__default['default'](SELECTOR_CONTENT);

      if (offset !== false) {
        if (max === heights.controlSidebar) {
          $contentSelector.css(this._config.panelAutoHeightMode, max + offset);
        } else if (max === heights.window) {
          $contentSelector.css(this._config.panelAutoHeightMode, max + offset - heights.header - heights.footer);
        } else {
          $contentSelector.css(this._config.panelAutoHeightMode, max + offset - heights.header);
        }

        if (this._isFooterFixed()) {
          $contentSelector.css(this._config.panelAutoHeightMode, parseFloat($contentSelector.css(this._config.panelAutoHeightMode)) + heights.footer);
        }
      }

      if (!$body.hasClass(CLASS_NAME_LAYOUT_FIXED$1)) {
        return;
      }

      if (typeof $__default['default'].fn.overlayScrollbars !== 'undefined') {
        $__default['default'](SELECTOR_SIDEBAR).overlayScrollbars({
          className: this._config.scrollbarTheme,
          sizeAutoCapable: true,
          scrollbars: {
            autoHide: this._config.scrollbarAutoHide,
            clickScrolling: true
          }
        });
      } else {
        $__default['default'](SELECTOR_SIDEBAR).css('overflow-y', 'auto');
      }
    }

    fixLoginRegisterHeight() {
      const $body = $__default['default']('body');
      const $selector = $__default['default'](`${SELECTOR_LOGIN_BOX}, ${SELECTOR_REGISTER_BOX}`);

      if ($selector.length === 0) {
        $body.css('height', 'auto');
        $__default['default']('html').css('height', 'auto');
      } else {
        const boxHeight = $selector.height();

        if ($body.css(this._config.panelAutoHeightMode) !== boxHeight) {
          $body.css(this._config.panelAutoHeightMode, boxHeight);
        }
      }
    } // Private


    _init() {
      // Activate layout height watcher
      this.fixLayoutHeight();

      if (this._config.loginRegisterAutoHeight === true) {
        this.fixLoginRegisterHeight();
      } else if (this._config.loginRegisterAutoHeight === parseInt(this._config.loginRegisterAutoHeight, 10)) {
        setInterval(this.fixLoginRegisterHeight, this._config.loginRegisterAutoHeight);
      }

      $__default['default'](SELECTOR_SIDEBAR).on('collapsed.lte.treeview expanded.lte.treeview', () => {
        this.fixLayoutHeight();
      });
      $__default['default'](SELECTOR_MAIN_SIDEBAR).on('mouseenter mouseleave', () => {
        if ($__default['default']('body').hasClass(CLASS_NAME_SIDEBAR_COLLAPSED)) {
          this.fixLayoutHeight();
        }
      });
      $__default['default'](SELECTOR_PUSHMENU_BTN).on('collapsed.lte.pushmenu shown.lte.pushmenu', () => {
        setTimeout(() => {
          this.fixLayoutHeight();
        }, 300);
      });
      $__default['default'](SELECTOR_CONTROL_SIDEBAR_BTN).on('collapsed.lte.controlsidebar', () => {
        this.fixLayoutHeight();
      }).on('expanded.lte.controlsidebar', () => {
        this.fixLayoutHeight('control_sidebar');
      });
      $__default['default'](window).resize(() => {
        this.fixLayoutHeight();
      });
      setTimeout(() => {
        $__default['default']('body.hold-transition').removeClass('hold-transition');
      }, 50);
    }

    _max(numbers) {
      // Calculate the maximum number in a list
      let max = 0;
      Object.keys(numbers).forEach(key => {
        if (numbers[key] > max) {
          max = numbers[key];
        }
      });
      return max;
    }

    _isFooterFixed() {
      return $__default['default'](SELECTOR_FOOTER$1).css('position') === 'fixed';
    } // Static


    static _jQueryInterface(config = '') {
      return this.each(function () {
          let data = $__default['default'](this).data(DATA_KEY$4);

          const _options = $__default['default'].extend({}, Default$3, $__default['default'](this).data());

          if (!data) {
              data = new Layout($__default['default'](this), _options);
              $__default['default'](this).data(DATA_KEY$4, data);
          }

          if (config === 'init' || config === '') {
              data._init();
          } else if (config === 'fixLayoutHeight' || config === 'fixLoginRegisterHeight') {
              data[config]();
          }
      });
    }

    }

    /**
     * Data API
     * ====================================================
     */


    $__default['default'](window).on('load', () => {
        Layout._jQueryInterface.call($__default['default']('body'));
    });
    $__default['default'](`${SELECTOR_SIDEBAR} a`).on('focusin', () => {
        $__default['default'](SELECTOR_MAIN_SIDEBAR).addClass(CLASS_NAME_SIDEBAR_FOCUSED);
    }).on('focusout', () => {
        $__default['default'](SELECTOR_MAIN_SIDEBAR).removeClass(CLASS_NAME_SIDEBAR_FOCUSED);
    });
    /**
     * jQuery API
     * ====================================================
     */

    $__default['default'].fn[NAME$4] = Layout._jQueryInterface;
    $__default['default'].fn[NAME$4].Constructor = Layout;

    $__default['default'].fn[NAME$4].noConflict = function () {
        $__default['default'].fn[NAME$4] = JQUERY_NO_CONFLICT$4;
        return Layout._jQueryInterface;
    };

    /**
     * --------------------------------------------
     * AdminLTE PushMenu.js
     * License MIT
     * --------------------------------------------
     */
    /**
     * Constants
     * ====================================================
     */

    const NAME$5 = 'PushMenu';
    const DATA_KEY$5 = 'lte.pushmenu';
    const EVENT_KEY$3 = `.${DATA_KEY$5}`;
    const JQUERY_NO_CONFLICT$5 = $__default['default'].fn[NAME$5];
    const EVENT_COLLAPSED$3 = `collapsed${EVENT_KEY$3}`;
    const EVENT_SHOWN = `shown${EVENT_KEY$3}`;
    const SELECTOR_TOGGLE_BUTTON = '[data-widget="pushmenu"]';
    const SELECTOR_BODY = 'body';
    const SELECTOR_OVERLAY = '#sidebar-overlay';
    const SELECTOR_WRAPPER = '.wrapper';
    const CLASS_NAME_COLLAPSED$1 = 'sidebar-collapse';
    const CLASS_NAME_OPEN = 'sidebar-open';
    const CLASS_NAME_IS_OPENING = 'sidebar-is-opening';
    const CLASS_NAME_CLOSED = 'sidebar-closed';
    const Default$4 = {
        autoCollapseSize: 992,
        enableRemember: false,
        noTransitionAfterReload: true
    };

    /**
     * Class Definition
     * ====================================================
     */

    class PushMenu {
        constructor(element, options) {
            this._element = element;
            this._options = $__default['default'].extend({}, Default$4, options);

            if ($__default['default'](SELECTOR_OVERLAY).length === 0) {
                this._addOverlay();
            }

            this._init();
        } // Public

        static _jQueryInterface(operation) {
            return this.each(function () {
                let data = $__default['default'](this).data(DATA_KEY$5);

                const _options = $__default['default'].extend({}, Default$4, $__default['default'](this).data());

                if (!data) {
                    data = new PushMenu(this, _options);
                    $__default['default'](this).data(DATA_KEY$5, data);
                }

                if (typeof operation === 'string' && operation.match(/collapse|expand|toggle/)) {
                    data[operation]();
                }
            });
        }

        expand() {
            const $bodySelector = $__default['default'](SELECTOR_BODY);

            if (this._options.autoCollapseSize && $__default['default'](window).width() <= this._options.autoCollapseSize) {
                $bodySelector.addClass(CLASS_NAME_OPEN);
            }

            $bodySelector.addClass(CLASS_NAME_IS_OPENING).removeClass(`${CLASS_NAME_COLLAPSED$1} ${CLASS_NAME_CLOSED}`).delay(50).queue(function () {
                $bodySelector.removeClass(CLASS_NAME_IS_OPENING);
                $__default['default'](this).dequeue();
            });

            if (this._options.enableRemember) {
                localStorage.setItem(`remember${EVENT_KEY$3}`, CLASS_NAME_OPEN);
            }

            $__default['default'](this._element).trigger($__default['default'].Event(EVENT_SHOWN));
        }

        collapse() {
            const $bodySelector = $__default['default'](SELECTOR_BODY);

            if (this._options.autoCollapseSize && $__default['default'](window).width() <= this._options.autoCollapseSize) {
                $bodySelector.removeClass(CLASS_NAME_OPEN).addClass(CLASS_NAME_CLOSED);
            }

            $bodySelector.addClass(CLASS_NAME_COLLAPSED$1);

            if (this._options.enableRemember) {
                localStorage.setItem(`remember${EVENT_KEY$3}`, CLASS_NAME_COLLAPSED$1);
            }

            $__default['default'](this._element).trigger($__default['default'].Event(EVENT_COLLAPSED$3));
        }

        toggle() {
            if ($__default['default'](SELECTOR_BODY).hasClass(CLASS_NAME_COLLAPSED$1)) {
                this.expand();
            } else {
                this.collapse();
            }
        }

        autoCollapse(resize = false) {
            if (!this._options.autoCollapseSize) {
                return;
            }

            const $bodySelector = $__default['default'](SELECTOR_BODY);

            if ($__default['default'](window).width() <= this._options.autoCollapseSize) {
                if (!$bodySelector.hasClass(CLASS_NAME_OPEN)) {
                    this.collapse();
                }
            } else if (resize === true) {
                if ($bodySelector.hasClass(CLASS_NAME_OPEN)) {
                    $bodySelector.removeClass(CLASS_NAME_OPEN);
                } else if ($bodySelector.hasClass(CLASS_NAME_CLOSED)) {
                    this.expand();
                }
            }
        }

        remember() {
            if (!this._options.enableRemember) {
                return;
            }

            const $body = $__default['default']('body');
            const toggleState = localStorage.getItem(`remember${EVENT_KEY$3}`);

            if (toggleState === CLASS_NAME_COLLAPSED$1) {
                if (this._options.noTransitionAfterReload) {
                    $body.addClass('hold-transition').addClass(CLASS_NAME_COLLAPSED$1).delay(50).queue(function () {
                        $__default['default'](this).removeClass('hold-transition');
                        $__default['default'](this).dequeue();
                    });
                } else {
                    $body.addClass(CLASS_NAME_COLLAPSED$1);
                }
            } else if (this._options.noTransitionAfterReload) {
                $body.addClass('hold-transition').removeClass(CLASS_NAME_COLLAPSED$1).delay(50).queue(function () {
                    $__default['default'](this).removeClass('hold-transition');
                    $__default['default'](this).dequeue();
                });
            } else {
                $body.removeClass(CLASS_NAME_COLLAPSED$1);
            }
        } // Private

        _init() {
            this.remember();
            this.autoCollapse();
            $__default['default'](window).resize(() => {
                this.autoCollapse(true);
            });
        }

        _addOverlay() {
            const overlay = $__default['default']('<div />', {
                id: 'sidebar-overlay'
            });
            overlay.on('click', () => {
                this.collapse();
            });
            $__default['default'](SELECTOR_WRAPPER).append(overlay);
        } // Static

    }

    /**
     * Data API
     * ====================================================
     */


    $__default['default'](document).on('click', SELECTOR_TOGGLE_BUTTON, event => {
        event.preventDefault();
        let button = event.currentTarget;

        if ($__default['default'](button).data('widget') !== 'pushmenu') {
            button = $__default['default'](button).closest(SELECTOR_TOGGLE_BUTTON);
        }

        PushMenu._jQueryInterface.call($__default['default'](button), 'toggle');
    });
    $__default['default'](window).on('load', () => {
        PushMenu._jQueryInterface.call($__default['default'](SELECTOR_TOGGLE_BUTTON));
    });
    /**
     * jQuery API
     * ====================================================
     */

    $__default['default'].fn[NAME$5] = PushMenu._jQueryInterface;
    $__default['default'].fn[NAME$5].Constructor = PushMenu;

    $__default['default'].fn[NAME$5].noConflict = function () {
        $__default['default'].fn[NAME$5] = JQUERY_NO_CONFLICT$5;
        return PushMenu._jQueryInterface;
    };

    /**
     * --------------------------------------------
     * AdminLTE Treeview.js
     * License MIT
     * --------------------------------------------
     */
    /**
     * Constants
     * ====================================================
     */

    const NAME$6 = 'Treeview';
    const DATA_KEY$6 = 'lte.treeview';
    const EVENT_KEY$4 = `.${DATA_KEY$6}`;
    const JQUERY_NO_CONFLICT$6 = $__default['default'].fn[NAME$6];
    const EVENT_EXPANDED$3 = `expanded${EVENT_KEY$4}`;
    const EVENT_COLLAPSED$4 = `collapsed${EVENT_KEY$4}`;
    const EVENT_LOAD_DATA_API = `load${EVENT_KEY$4}`;
    const SELECTOR_LI = '.nav-item';
    const SELECTOR_LINK = '.nav-link';
    const SELECTOR_TREEVIEW_MENU = '.nav-treeview';
    const SELECTOR_OPEN = '.menu-open';
    const SELECTOR_DATA_WIDGET = '[data-widget="treeview"]';
    const CLASS_NAME_OPEN$1 = 'menu-open';
    const CLASS_NAME_IS_OPENING$1 = 'menu-is-opening';
    const CLASS_NAME_SIDEBAR_COLLAPSED$1 = 'sidebar-collapse';
    const Default$5 = {
        trigger: `${SELECTOR_DATA_WIDGET} ${SELECTOR_LINK}`,
        animationSpeed: 300,
        accordion: true,
        expandSidebar: false,
        sidebarButtonSelector: '[data-widget="pushmenu"]'
    };

    /**
     * Class Definition
     * ====================================================
     */

    class Treeview {
        constructor(element, config) {
            this._config = config;
            this._element = element;
        } // Public

        static _jQueryInterface(config) {
            return this.each(function () {
                let data = $__default['default'](this).data(DATA_KEY$6);

                const _options = $__default['default'].extend({}, Default$5, $__default['default'](this).data());

                if (!data) {
                    data = new Treeview($__default['default'](this), _options);
                    $__default['default'](this).data(DATA_KEY$6, data);
                }

                if (config === 'init') {
                    data[config]();
                }
            });
        }

        init() {
            $__default['default'](`${SELECTOR_LI}${SELECTOR_OPEN} ${SELECTOR_TREEVIEW_MENU}${SELECTOR_OPEN}`).css('display', 'block');

            this._setupListeners();
        }

        expand(treeviewMenu, parentLi) {
            const expandedEvent = $__default['default'].Event(EVENT_EXPANDED$3);

            if (this._config.accordion) {
                const openMenuLi = parentLi.siblings(SELECTOR_OPEN).first();
                const openTreeview = openMenuLi.find(SELECTOR_TREEVIEW_MENU).first();
                this.collapse(openTreeview, openMenuLi);
            }

            parentLi.addClass(CLASS_NAME_IS_OPENING$1);
            treeviewMenu.stop().slideDown(this._config.animationSpeed, () => {
                parentLi.addClass(CLASS_NAME_OPEN$1);
                $__default['default'](this._element).trigger(expandedEvent);
            });

            if (this._config.expandSidebar) {
                this._expandSidebar();
            }
        }

        collapse(treeviewMenu, parentLi) {
            const collapsedEvent = $__default['default'].Event(EVENT_COLLAPSED$4);
            parentLi.removeClass(`${CLASS_NAME_IS_OPENING$1} ${CLASS_NAME_OPEN$1}`);
            treeviewMenu.stop().slideUp(this._config.animationSpeed, () => {
                $__default['default'](this._element).trigger(collapsedEvent);
                treeviewMenu.find(`${SELECTOR_OPEN} > ${SELECTOR_TREEVIEW_MENU}`).slideUp();
                treeviewMenu.find(SELECTOR_OPEN).removeClass(CLASS_NAME_OPEN$1);
            });
        }

        toggle(event) {
            const $relativeTarget = $__default['default'](event.currentTarget);
            const $parent = $relativeTarget.parent();
            let treeviewMenu = $parent.find(`> ${SELECTOR_TREEVIEW_MENU}`);

            if (!treeviewMenu.is(SELECTOR_TREEVIEW_MENU)) {
                if (!$parent.is(SELECTOR_LI)) {
                    treeviewMenu = $parent.parent().find(`> ${SELECTOR_TREEVIEW_MENU}`);
                }

                if (!treeviewMenu.is(SELECTOR_TREEVIEW_MENU)) {
                    return;
                }
            }

            event.preventDefault();
            const parentLi = $relativeTarget.parents(SELECTOR_LI).first();
            const isOpen = parentLi.hasClass(CLASS_NAME_OPEN$1);

            if (isOpen) {
                this.collapse($__default['default'](treeviewMenu), parentLi);
            } else {
                this.expand($__default['default'](treeviewMenu), parentLi);
            }
        } // Private

        _setupListeners() {
            const elementId = this._element.attr('id') !== undefined ? `#${this._element.attr('id')}` : '';
            $__default['default'](document).on('click', `${elementId}${this._config.trigger}`, event => {
                this.toggle(event);
            });
        }

        _expandSidebar() {
            if ($__default['default']('body').hasClass(CLASS_NAME_SIDEBAR_COLLAPSED$1)) {
                $__default['default'](this._config.sidebarButtonSelector).PushMenu('expand');
            }
        } // Static

    }

    /**
     * Data API
     * ====================================================
     */


    $__default['default'](window).on(EVENT_LOAD_DATA_API, () => {
        $__default['default'](SELECTOR_DATA_WIDGET).each(function () {
            Treeview._jQueryInterface.call($__default['default'](this), 'init');
        });
    });
    /**
     * jQuery API
     * ====================================================
     */

    $__default['default'].fn[NAME$6] = Treeview._jQueryInterface;
    $__default['default'].fn[NAME$6].Constructor = Treeview;

    $__default['default'].fn[NAME$6].noConflict = function () {
        $__default['default'].fn[NAME$6] = JQUERY_NO_CONFLICT$6;
        return Treeview._jQueryInterface;
    };

    exports.CardWidget = CardWidget;
    exports.ControlSidebar = ControlSidebar;
    exports.Dropdown = Dropdown;
    exports.ExpandableTable = ExpandableTable;
    exports.Layout = Layout;
    exports.PushMenu = PushMenu;
    exports.Treeview = Treeview;

    Object.defineProperty(exports, '__esModule', {value: true});

})));
//# sourceMappingURL=adminlte.js.map
