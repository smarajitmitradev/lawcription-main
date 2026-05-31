
const prices = {
    monthly:   { p1:'₹499', p2:'₹399', p3:'₹349', b1:'Billed monthly', b2:'₹1,197 billed quarterly', b3:'₹2,094 billed half-yearly' },
    quarterly: { p1:'₹449', p2:'₹359', p3:'₹319', b1:'₹1,347 billed quarterly', b2:'₹1,077 billed quarterly', b3:'₹1,914 billed half-yearly' },
    biannual:  { p1:'₹399', p2:'₹319', p3:'₹279', b1:'₹2,394 billed half-yearly', b2:'₹1,914 billed half-yearly', b3:'₹1,674 billed half-yearly' },
  };
  function setToggle(mode) {
    ['t1','t2','t3'].forEach(id => document.getElementById(id).classList.remove('on'));
    const map = { monthly:'t1', quarterly:'t2', biannual:'t3' };
    document.getElementById(map[mode]).classList.add('on');
    const d = prices[mode];
    for (let k of ['p1','p2','p3','b1','b2','b3']) {
      document.getElementById(k).textContent = d[k];
    }
  }