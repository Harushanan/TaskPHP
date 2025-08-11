<section class="form" id="form">
    <h2>Get An Appointment</h2>
    <p>They will have to make the best of things — it's an uphill climb</p>
    <form method ="POST" >
      @csrf
      <div class="form-group">
        <input type="text" placeholder="Owner  Name" required />
        <input type="text" placeholder="Pet Name" required />
      </div>
      <div class="form-group">
        <input type="email" placeholder="Email" required />
        <input type="tel" placeholder="Phone Number" required />
      </div>
      <div class="form-group">
        <input type="text" placeholder="Pet Category (e.g., Dog, Cat)" required />
      </div>
      <div class="checkbox-group">
        <label><input type="checkbox" name="serviceType" value="Pet Grooming" /> Pet Grooming</label>
        <label><input type="checkbox" name="serviceType" value="Veterinary Services" /> Veterinary Services</label>
        <label><input type="checkbox" name="serviceType" value="Pet Boarding & Daycare" /> Pet Boarding & Daycare</label>
      </div>
      <button type="submit">Book Appointment</button>
    </form>
  </section>