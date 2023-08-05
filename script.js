
var rule1 = document.getElementById('rule1');
var precision = document.getElementById('precision');

rule1.addEventListener('mouseover', function() {
  precision.style.display = 'block';
  precision.innerHTML = 'Accurate and consistent medical assessments.';
});

rule1.addEventListener('mouseout', function() {
  precision.style.display = 'none';
});


var rule2 = document.getElementById('rule2');
var ethics = document.getElementById('ethics');

rule2.addEventListener('mouseover', function() {
  ethics.style.display = 'block';
  ethics.innerHTML = 'Guiding principles for ethical decision-making in healthcare';
});

rule2.addEventListener('mouseout', function() {
  ethics.style.display = 'none';
});


var rule3 = document.getElementById('rule3');
var safety = document.getElementById('safety');

rule3.addEventListener('mouseover', function() {
  safety.style.display = 'block';
  safety.innerHTML = 'Preventing harm and ensuring patient well-being in medical practices.';
});

rule3.addEventListener('mouseout', function() {
  safety.style.display = 'none';
});