<!DOCTYPE html>
<html>

<head>
    <title>Reports</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .total-row {
            font-weight: bold;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <h1>Booking Reports {{ ucfirst($filterType) }}</h1>

    <table>
        <thead>
            <tr>
                <th>BOOKING ID</th>
                <th>CUSTOMER</th>
                <th>SERVICE</th>
                <th>DATE</th>
                <th>BARBER</th>
                <th>PRICE</th>
            </tr>
        </thead>
        <tbody>
            @forelse($bookings as $booking)
                <tr>
                    <td>{{ $booking->booking_id }}</td>
                    <td>{{ $booking->user->name }}</td>
                    <td>{{ $booking->service->name }}</td>
                    <td>{{ \Carbon\Carbon::parse($booking->date)->format('M d, Y') }}</td>
                    <td>{{ $booking->barber ? $booking->barber->name : 'No barber assigned' }}</td>
                    <td>Rp{{ number_format($booking->service->price, 0, ',', '.') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" style="text-align: center;">No bookings found for this period</td>
                </tr>
            @endforelse
        </tbody>
        <tfoot>
            <tr class="total-row">
                <td colspan="5" style="text-align: right;">TOTAL</td>
                <td>Rp{{ number_format($totalPrice, 0, ',', '.') }}</td>
            </tr>
        </tfoot>
    </table>

    <div style="margin-top: 20px; text-align: right;">
        <p>Generated on: {{ $generatedAt->format('F d, Y H:i A') }}</p>
    </div>
</body>

</html>
