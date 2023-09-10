var $toRight = $(".to-right"),
  $toLeft = $(".to-left"),
  $movebox = $(".movebox"),
  $signup = $(".signup"),
  $login = $(".login"),
  config = {},
  tl = new TimelineMax();

function toRight() {
  tl.to($movebox, 1, { x: 340, ease: Elastic.easeOut })
    .to($signup, 0, { autoAlpha: 0 }, "-=1")
    .to($login, 0, { autoAlpha: 1 }, "-=1");
}
function toLeft() {
  tl.to($movebox, 1, { x: 0, ease: Elastic.easeOut })
    .to($signup, 0, { autoAlpha: 1 }, "-=1")
    .to($login, 0, { autoAlpha: 0 }, "-=1");
}

$toRight.on("click", function () {
  toRight();
});

$toLeft.on("click", function () {
  toLeft();
});
