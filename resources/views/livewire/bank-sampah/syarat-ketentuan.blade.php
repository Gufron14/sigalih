<div class="container p-5">
    <div class="text-center mb-3">
        <h3>Syarat dan Ketentuan</h3>
        <h5>Program Bank Sampah Desa Sirnagalih</h5>
    </div>
    <hr class="border-2 mb-3">
    <div class="ms-5 me-5">
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut sunt accusamus necessitatibus sit odit distinctio modi nemo laboriosam odio ipsum rerum nam repellendus, deserunt earum pariatur ipsam dolor ratione similique ipsa illo est consequuntur quaerat officiis consequatur? Odio, iste accusamus placeat distinctio laboriosam odit. Hic autem tempore atque, commodi laborum temporibus quia quaerat nisi suscipit debitis cumque ut! Praesentium voluptas mollitia dolorum sint error totam assumenda expedita aliquam placeat, possimus at deleniti dolorem incidunt laboriosam accusamus eos esse doloribus enim, modi recusandae excepturi quam? Vitae vero iusto aut beatae quasi cumque culpa adipisci, in neque pariatur ex nemo rerum tempore?</p>
        
        <div>
          <div class="form-check">
              <input class="form-check-input" type="checkbox" id="acceptedTerms" wire:model.live.debounce.250ms="acceptedTerms">
              <label class="form-check-label" for="acceptedTerms">
                  Saya menyetujui Syarat & Ketentuan
              </label>
          </div>
          <div class="form-check">
              <input class="form-check-input" type="checkbox" id="acceptedConditions" wire:model.live.debounce.250ms="acceptedConditions">
              <label class="form-check-label" for="acceptedConditions">
                  Apabila saya melanggar Syarat & Ketentuan, maka saya bersedia dikenai sanksi sesuai peraturan yang berlaku.
              </label>
          </div>
      
          <button class="btn btn-primary" disabled="{{ !$acceptedTerms || !$acceptedConditions }}">Lanjutkan</button>
      </div>
        
        <div class="mt-3">
            <p>Anda harus verifikasi Email terlebih dahulu</p>
            <button class="btn btn-primary fw-bold">Verifikasi Email</button>
        </div>
    </div>
</div>
