def min_coins(coins, amount):
    coins = [coin for coin in coins if coin < amount]

    if len(coins) == 0:
        return -1

    if amount in coins:
        return 1

    dp = [float('inf')] * (amount + 1)
    dp[0] = 0  # Base case: 0 coins are needed to make amount 0

    for i in range(1, amount + 1):
        for coin in coins:
            if i - coin < 0:
                continue

            dp[i] = min(dp[i - coin] + 1, dp[i])

    return dp[amount] if dp[amount] != float('inf') else -1

print(min_coins([1, 2, 5], 11))  # 3
print(min_coins([2, 5, 4], 8)) # 2
print(min_coins([100, 10_000, 5, 10], 115)) # 3
print(min_coins([6], 7)) # -1
print(min_coins([100, 5, 10, 15, 1, 2, 3, 4], 110)) # 2
print(min_coins([10, 3, 50], 115)) # 7
print(min_coins([1, 3, 5, 7], 16)) # 4
