const button = document.querySelector('#profile_wrapper');
const tooltip = document.querySelector('#tooltip');

let popperInstance = null;

    function create() {
        popperInstance = Popper.createPopper(button, tooltip, {
          modifiers: [
            {
              name: 'offset',
              options: {
                offset: [0, 3],
              },
            },
          ],
        });
    }

    function destroy() {
        if (popperInstance) {
          popperInstance.destroy();
          popperInstance = null;
        }
    }

    function show() {
        tooltip.setAttribute('data-show', '');
        create();
    }

    function hide() {
        tooltip.removeAttribute('data-show');
        destroy();
    }

const showEvents = ['mouseenter', 'focus'];
const hideEvents = ['mouseleave', 'blur'];

    showEvents.forEach(event => {
        profile_wrapper.addEventListener(event, show);
    });

    hideEvents.forEach(event => {
        profile_wrapper.addEventListener(event, hide);
    });