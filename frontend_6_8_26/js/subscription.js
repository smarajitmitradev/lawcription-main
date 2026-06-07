const prices = {
  monthly: {
    n1:'1 Month',  p1:'₹499', s1:null,      b1:'Billed monthly',
    n2:'3 Months', p2:'₹399', s2:'20% OFF', b2:'₹1,197 billed quarterly',
    n3:'6 Months', p3:'₹349', s3:'30% OFF', b3:'₹2,094 billed half-yearly',
    badge2:'⭐ POPULAR',
  },
  yearly: {
    n1:'1 Year',  p1:'₹299', s1:'40% OFF', b1:'₹3,588 billed annually',
    n2:'2 Years', p2:'₹249', s2:'50% OFF', b2:'₹5,976 billed every 2 years',
    n3:'3 Years', p3:'₹199', s3:'60% OFF', b3:'₹7,164 billed every 3 years',
    badge2:'⭐ BEST VALUE',
  },
};

function setToggle(mode) {
  var d = prices[mode];
  if (!d) return;

  /* --- toggle buttons: explicit remove then add, no .toggle() --- */
  var t1 = document.getElementById('t1');
  var t2 = document.getElementById('t2');
  if (t1) { t1.classList.remove('on'); }
  if (t2) { t2.classList.remove('on'); }
  if (mode === 'monthly' && t1) { t1.classList.add('on'); }
  if (mode === 'yearly'  && t2) { t2.classList.add('on'); }

  /* --- text fields --- */
  ['n1','n2','n3','p1','p2','p3','b1','b2','b3','badge2'].forEach(function(k) {
    var el = document.getElementById(k);
    if (el && d[k] != null) { el.textContent = d[k]; }
  });

  /* --- save badges: show or hide --- */
  ['s1','s2','s3'].forEach(function(k) {
    var el = document.getElementById(k);
    if (!el) return;
    if (d[k]) {
      el.textContent    = d[k];
      el.style.display  = '';
    } else {
      el.style.display  = 'none';
    }
  });
}

document.addEventListener('DOMContentLoaded', function() {
  setToggle('monthly');
});