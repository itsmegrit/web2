<form id="idFrmTinh" action="index.php" method="GET">
  <div class="soA">
    <div class="lblSoA">Số a: </div>
    <input id="idSoA" name="soA" type="text">
  </div>
  <div class="soB">
    <div class="lblSoB">Số b: </div>
    <input id="idSoB" name="soB" type="text">
  </div>
  <div id="ketQua">Kết quả: </div>
  <select name="phepTinh" id="idSelPhepTinh">
    <option value="Cong">+</option>
    <option value="Tru">-</option>
    <option value="Nhan">*</option>
    <option value="Chia">/</option>
  </select>
  <button id="idBtnTinhJS">Tính JS</button>
  <button type="submit" id="idBtnTinhPHP">Tính PHP</button>
  <input type="hidden" name="id" value="idTinhToan">
</form>