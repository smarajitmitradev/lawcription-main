/* ============================================================
   subscription.js  —  3 fixed plans, no monthly/yearly toggle
   Plans: 1_month | 3_month | 1_year
   ============================================================ */

/* Plan map used by the blade buttons */
var planConfig = {
  plan1:    { plan: '1_month',  amount: 499  },
  plan2:    { plan: '6_month',  amount: 2394 },
  plan3:    { plan: '1_year',   amount: 3588 },
  planTest: { plan: '7_day',    amount: 1    }, /* TEMP — remove after live autopay test */
};

/* ── Removed: setToggle, prices object, currentMode ── */

/* ============================================================
   Scroll-reveal
   ============================================================ */
document.addEventListener('DOMContentLoaded', function () {

  /* Intersection observer for .reveal elements */
  var io = new IntersectionObserver(function (entries) {
    entries.forEach(function (e) {
      if (e.isIntersecting) {
        e.target.classList.add('visible');
        io.unobserve(e.target);
      }
    });
  }, { threshold: 0.12 });

  document.querySelectorAll('.reveal').forEach(function (el) {
    io.observe(el);
  });

});