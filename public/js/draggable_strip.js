class DraggableStrip {
    constructor(selector, hasChildren = false, childrenSelectorArray = []) {
        this.selector = selector;
        this.HTMLElement = this.getParentContainer();

        this.hasChildren = hasChildren;
        if (this.hasChildren) {
            this.childrenSelectorArray = childrenSelectorArray;
            this.children = this.getChildren();

            this.preventChildrenBehavior();
        }

        this.stripState = {
            moving: false,
            dragging: false,
            startX: 0,
            scrollLeft: 0,
        };

        this.dragPrevent = this.dragPrevent.bind(this);
        this.onMouseDown = this.onMouseDown.bind(this);
        this.onMouseMove = this.onMouseMove.bind(this);
        this.onMouseLeave = this.onMouseLeave.bind(this);

        this.HTMLElement.addEventListener("mouseup", this.dragPrevent);
        this.HTMLElement.addEventListener("mousedown", this.onMouseDown);

        this.HTMLElement.addEventListener("mousemove", this.onMouseMove);
        this.HTMLElement.addEventListener("mouseleave", this.onMouseLeave);
        this.HTMLElement.addEventListener("mouseover", this.onMouseOver);

        setInterval(() => {
            this.HTMLElement.scrollLeft += 1;
        }, 40);
    }

    getParentContainer() {
        return document.querySelector(this.selector);
    }

    getChildren() {
        const combinedSelector =
            this.childrenSelectorArray.length > 1
                ? this.childrenSelectorArray.join(", ")
                : this.childrenSelectorArray[0];
        return document.querySelectorAll(combinedSelector);
    }

    preventChildrenBehavior() {
        this.children.forEach((link) => {
            link.addEventListener("click", (event) => {
                if (this.stripState.moving) {
                    event.preventDefault();
                }
            });
        });
    }

    scrollWheel(e) {
        const elem = this.HTMLElement;
        elem.scrollTo({
            left: elem.scrollLeft + e.deltaY * 3,
            behavior: "smooth",
        });
    }

    // drag stop
    dragPrevent(e) {
        setTimeout(() => {
            this.stripState.moving = false;
            this.stripState.dragging = false;
        }, 20);
    }

    onMouseDown(e) {
        e.preventDefault();
        this.stripState = {
            ...this.stripState,
            dragging: true,
            startX: e.pageX - this.HTMLElement.offsetLeft,
            scrollLeft: this.HTMLElement.scrollLeft,
        };
    }

    // start dragging
    onMouseMove(e) {
        e.preventDefault();
        const { dragging, startX, scrollLeft } = this.stripState;
        if (dragging) {
            this.stripState.moving = true;

            const movingTo = e.pageX - this.HTMLElement.offsetLeft;
            const move = movingTo - startX;
            this.HTMLElement.scrollLeft = scrollLeft - move;
        }
    }

    onMouseLeave() {
        this.stripState.dragging = false;
        this.stripState.moving = false;
    }

    onMouseOver() {}
}

const headerStrip = new DraggableStrip(".navbar__links", true, [
    ".navbar__link-container",
]);

console.log(headerStrip);
